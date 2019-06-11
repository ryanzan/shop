<?php

namespace App\Http\Controllers\Front;

use App\Models\ClothesType;
use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public  function index(){
        $data['shops'] = Shop::paginate(6);
        $data['types'] = ClothesType::all();
        $data['genders'] = ['male', 'female'];
        $data['ages'] = ['children', 'young', 'adult', 'old'];
        $data['sizes'] = ['S','M','L','XL','XXL','XXXL'];

        return view('welcome',$data);
    }

    public function search(Request $request){


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
