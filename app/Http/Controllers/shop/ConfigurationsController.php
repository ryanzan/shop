<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConfigurationsController extends Controller
{
    protected $destination;

    function __construct()
    {
        $this->destination = base_path() . '/public/uploads/shops';
    }

    public function getIndex()
    {
        $data['configuration'] = Auth::user()->shop;
        return view('shop.configuration.configuration', $data);
    }

    public function getEdit()
    {
        $data['configuration'] = Auth::user()->shop;
        return view('shop.configuration.edit', $data);
    }

    public function postStore(Request $request)
    {
        $data = $request->except('image');

        if (!Auth::user()->shop) {
            $shop = Auth::user()->shop()->create($data);
            if ($request->has('image')) {
                $file = $request->file('image');
                $name = "shop" . rand(1, 100) . "_" . $file->getClientOriginalName();
                $destination = $this->destination;
                $file->move($destination, $name);
                $imageName = $name;
                $shop->image = $imageName;
                $shop->save();
            }
        } else {
            $shop = Auth::user()->shop();
            $imageName = '';
            if ($request->has('image')) {
                $file = $request->file('image');
                $name = "shop" . rand(1, 100) . "_" . $file->getClientOriginalName();
                $destination = $this->destination;
                $file->move($destination, $name);
                $imageName = $name;
            }
            $shop->update([
                'name' => $request->name,
                'address' => $request->address,
                'phone_number' => $request->phone_number,
                'email' => $request->email,
                'website' => $request->website,
                'latitude' => $request->latitude,
                'longitude' => $request->longitude,
                'image'=> $imageName
            ]);

        }
        return redirect('/shop/configurations');
    }
}
