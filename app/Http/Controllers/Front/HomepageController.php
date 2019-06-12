<?php

namespace App\Http\Controllers\Front;

use App\Models\Clothes;
use App\Models\ClothesType;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class HomepageController extends Controller
{
    public function index()
    {
        $data['shops'] = Shop::paginate(6);
        $data['types'] = ClothesType::all();
        $data['genders'] = ['male', 'female'];
        $data['ages'] = ['children', 'young', 'adult', 'old'];
        $data['sizes'] = ['S', 'M', 'L', 'XL', 'XXL', 'XXXL'];

        return view('welcome', $data);
    }

    public function search(Request $request)
    {

        $clothesType = $request->type;
        $clothesTypeInput = Clothes::where('clothes_type_id', $clothesType)->get();

        //return if clothes is not found in database
        if ($clothesTypeInput->count() == 0) {
            return back()->with('message', 'Sorry the type of clothes you looking for is not available in our database!!');
        }
        $inputData = $request->all();
        $shops = Shop::all();

        $latitudeFrom = $request->latitude;
        $longitudeFrom = $request->longitude;
        $clothes = Clothes::all();

        $types = ClothesType::all();
        $shopVectorIndex = [];
        $addresses = [];
        //to make an vector
        foreach ($types as $type) {
            $shopVectorIndex[] = $type->name;
        }
        foreach ($shops as $shop) {
            $shopVectorIndex[] = $shop->address;
            $addresses[] = $shop->address;
        }

        $shopVectorIndex[] = 'female';
        $shopVectorIndex[] = 'male';
        $shopVectorIndex[] = 'totalClothes';

        array_push($shopVectorIndex, 'children', 'young', 'adult', 'old');
        array_push($shopVectorIndex, 'S', 'M', 'L', 'XL', 'XXL', 'XXXL');


        // select colors from db
        $colors = DB::table('clothes')
            ->select('color')
            ->groupBy('color')
            ->get();

        $c = [];
        foreach ($colors as $color)
            foreach ($color as $d)
                $c[] = $d;

        $colors = $c ;

        // select materials from db
        $materials = DB::table('clothes')
            ->select('material')
            ->groupBy('material')
            ->get();

        $m = [];
        foreach ($materials as $material)
            foreach ($material as $d)
                $m[] = $d;

        $materials = $m ;

        $shopVectorIndex = array_merge($shopVectorIndex, $materials);
        $shopVectorIndex = array_merge($shopVectorIndex, $colors);


        $newArry = [];
        foreach ($shopVectorIndex as $index) {
            $newArry[] = '';
        }

        $shopVectors = array_combine($shopVectorIndex, $newArry);
        $vector = [];
        $newShops = [];
        $nearerShops = [];
        $i = 0;
        foreach ($shops as $shop) {
            $latitudeTo = $shop->latitude;
            $longitudeTo = $shop->longitude;
            $distance = $this->haversineGreatCircleDistance($latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo);
            if ($distance < intval($request->within)) {
                $i++;
                $newShops[] = $shop;
//                if ($i < 4)
                $nearerShops[$distance+$i] = $shop;
            }
        }
        $shops = $nearerShops;
        ksort($nearerShops); //sorting according to distance
        $newNeareast = [];
        $i = 0;
        foreach ($nearerShops as $shop) {
            $i++;
            if ($i < 4)
                $newNeareast[] = $shop;
        }
        $data['nearerShopss'] = $newNeareast;
        //return if no hospitals found within given range
        if (empty($shops)) {
            return back()->with('message', 'Can not find any shop within ' . $request->within . ' KM');
        }

        //return to result if only address is provided
        if ($request->type == "" && $request->material == "" && $request->size == "" && $request->color == "" && $request->price == "" && $request->age_group == "" && $request->gender == "") {
            return view('results', $data);
        }
        $vectors = [];

        foreach ($shopVectors as $k=>$v)
            $vector[$k] = 0;


        foreach ($shops as $shop) {
            $clothes = $shop->clothes()->where('clothes_type_id',$clothesType)->get();
            foreach ($shopVectors as $key => $value) {
                $countType = 0;
                $sizes = ['S' => 0, 'M' => 0, 'L' => 0, 'XL' => 0, 'XXL' => 0, 'XXXL' => 0];
                $genders = ['male'=>0, 'female'=>0];
                $ages = ['children'=>0, 'young'=>0, 'adult'=>0, 'old'=>0];
                $colorsValues = [];
                $materialValues = [];
                foreach ($colors as $color)
                    $colorsValues[$color] = 0;
                foreach ($materials as $material)
                    $materialValues[$material] = 0;

                foreach ($clothes as $clothe) {
                    if (strcmp($clothe->type->name, $key) == 0) {
                        $countType++;
                        $vector[$key] = $countType;
                    }
                    if ($clothe->size == $key) {
                        $sizes[$key]++;
                        $vector[$key] = $sizes[$key];
                    }
                    if ($clothe->gender==$key){
                        $genders[$key]++;
                        $vector[$key] = $genders[$key];
                    }
                    if ($clothe->age_group==$key){
                        $ages[$key]++;
                        $vector[$key] = $ages[$key];
                    }
                    if ($clothe->color == $key){
                        $colorsValues[$key]++;
                        $vector[$key] = $colorsValues[$key];
                    }
                }
                $vector['totalClothes'] = $shop->clothes()->where('clothes_type_id',$clothesType)->count();
            }
            foreach ($addresses as $address) {
                if (strcmp($address, $shop->address) == 0) {
                    $vector[$address] = 1;
                }
            }
            ksort($vector);
            $vectors[$shop->name] = $vector;
        }
        foreach ($shopVectors as $key => $value) {
            $shopVectors[$key] = 0;
        }
        foreach ($clothesTypeInput as $item) {
            foreach ($shopVectors as $key => $value) {
                $shopVectors[$key] = 0;
                if ($item->type->name == $key) {
                    $shopVectors[$key] = 1;
                }
                if ($inputData['address'] == $key) {
                    $shopVectors[$key] = 1;
                }
                if ($inputData['age_group'] == $key) {
                    $shopVectors[$key] = 1;
                }
                if ($inputData['gender'] == $key) {
                    $shopVectors[$key] = 1;
                }
                if ($inputData['size'] == $key) {
                    $shopVectors[$key] = 1;
                }
                if ($inputData['material'] == $key) {
                    $shopVectors[$key] = 1;
                }
                if ($inputData['color'] == $key) {
                    $shopVectors[$key] = 1;
                }
                $shopVectors['totalClothes'] = 1;
            }
        }
        ksort($shopVectors);
//        dd($shopVectors);
        $inputVector = $shopVectors;
//        dd($inputVector);
        $results = [];
        foreach ($vectors as $key => $value) {
            $results[$key] = $this->similarity($inputVector, $value);
        }

        arsort($results);
        $finalResult = [];
        $cosineValues = [];
        $count = 0;
        foreach ($results as $key => $value) {
            if ($count == 3)
                break;
            $finalResult[] = Shop::where('name', $key)->first();
            $cosineValues[$key] = $value;
            $count++;
        }
        $count = 0;
        foreach ($finalResult as $item) {
//
            $item->cosine = $results[$item->name] * 100;
        }
//        dd($finalResult);
        $data['searchedFor'] = ClothesType::findorfail($clothesType)->name;
        $data['searchedFrom'] = $inputData['address'];
//        dd($inputData);
        $data['finalShops'] = $finalResult;
//        dd($data);
        return view('results', $data);
    }

    /********* for calculating distance on earth surface *******/
    public function haversineGreatCircleDistance(
        $latitudeFrom, $longitudeFrom, $latitudeTo, $longitudeTo, $earthRadius = 6371) //6371 km
    {
        // convert from degrees to radians
        $latFrom = deg2rad($latitudeFrom);
        $lonFrom = deg2rad($longitudeFrom);
        $latTo = deg2rad($latitudeTo);
        $lonTo = deg2rad($longitudeTo);

        $latDelta = $latTo - $latFrom;
        $lonDelta = $lonTo - $lonFrom;

        $angle = 2 * asin(sqrt(pow(sin($latDelta / 2), 2) +
                cos($latFrom) * cos($latTo) * pow(sin($lonDelta / 2), 2)));
        return $angle * $earthRadius;
    }

    /********** calculating similarity by using cosine similarity ******/
    protected function similarity(array $vec1, array $vec2)
    {
        $vec1 = $this->lengthNormalization($vec1);
        $vec2 = $this->lengthNormalization($vec2);
//        dd($vec1);
        return $this->dotProduct($vec1, $vec2);
//        / ($this->absVector($vec1) * $this->absVector($vec2))
    }

    /********** length normalization ***********/
    protected function lengthNormalization(array $vect)
    {
        $magnitude = $this->absVector($vect);
//        dd($vect);
//        dd($magnitude);
        $newVect = $vect;
        foreach ($vect as $key => $value) {
            $newVect[$key] = $value / $magnitude;
        }
        return $newVect;
    }

    /*******calculating dot product **********/
    protected function dotProduct(array $vec1, array $vec2)
    {
        $result = 0;

        foreach (array_keys($vec1) as $key1) {
            foreach (array_keys($vec2) as $key2) {
                if ($key1 === $key2)
                    $result += $vec1[$key1] * $vec2[$key2];
            }
        }

        return $result;
    }

    /******** for calculating absolute value of vector ******/
    protected function absVector(array $vec)
    {
        $result = 0;
        foreach (array_values($vec) as $value) {
            $result += $value * $value;
        }
        return sqrt($result);
    }
}
