<?php

namespace App\Http\Controllers\shop;

use App\Models\Clothes;
use App\Models\ClothesType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use function Psy\sh;

class ClothesController extends Controller
{
    protected $destination;

    function __construct()
    {
        $this->destination = base_path() . '/public/uploads/clothes';
    }
    public function index()
    {
        $shop = Auth::user()->shop;

        $clothes = $shop->clothes()->paginate(10);
        return view('shop.clothes.list', compact('clothes'));
    }

    public function create()
    {
        $data['types'] = ClothesType::all();
        $data['genders'] = ['male', 'female'];
        $data['ages'] = ['children', 'young', 'adult', 'old'];
        $data['sizes'] = ['S','M','L','XL','XXL','XXXL'];


        return view('shop.clothes.create', $data);
    }

    public function store(Request $request){
        $request->validate([
           'name'=>'required|string:255',
           'price'=>'required|numeric'
        ]);

        $data = $request->except('image');
        $data['shop_id'] = Auth::user()->shop->id;
        $clothes = Clothes::create($data);

        if ($request->has('image')) {
            $file = $request->file('image');
            $name = "shop" . rand(1, 100) . "_" . $file->getClientOriginalName();
            $destination = $this->destination;
            $file->move($destination, $name);
            $imageName = $name;
            $clothes->image = $imageName;
            $clothes->save();
        }

        return redirect('/shop/clothes');
    }

    public function edit($id)
    {
        $data['types'] = ClothesType::all();
        $data['genders'] = ['male', 'female'];
        $data['ages'] = ['children', 'young', 'adult', 'old'];
        $data['sizes'] = ['S','M','L','XL','XXL','XXXL'];
        $data['clothes'] = Clothes::findorfail($id);
        return view('shop.clothes.edit',$data);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'=>'required|string:255',
            'price'=>'required|numeric'
        ]);

        $data = $request->except('image');

        $clothes = Clothes::findorfail($id);
        $clothes->update($data);
        if ($request->has('image')) {
            $file = $request->file('image');
            $name = "shop" . rand(1, 100) . "_" . $file->getClientOriginalName();
            $destination = $this->destination;
            $file->move($destination, $name);
            $imageName = $name;
            $clothes->image = $imageName;
            $clothes->save();
        }

        return redirect('/shop/clothes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $type = Clothes::findorfail($id);
        $type->delete();
        return back();
    }
}
