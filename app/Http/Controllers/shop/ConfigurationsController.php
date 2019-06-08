<?php

namespace App\Http\Controllers\Shop;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ConfigurationsController extends Controller
{
    public function getIndex(){
        $data['configuration'] = Auth::user()->shop;
        return view('shop.configuration.configuration',$data);
    }
    public function getEdit()
    {
        $data['configuration'] = Auth::user()->shop;
        return view('shop.configuration.edit',$data);
    }

    public function postStore(Request $request)
    {
        if(!Auth::user()->shop)
            Auth::user()->shop()->create($request->all());
        else
        {
            Auth::user()->shop()->update([
                'name'=>$request->name,
                'address'=>$request->address,
                'phone_number'=>$request->phone_number,
                'email'=>$request->email,
                'website'=>$request->website,
                'latitude'=>$request->latitude,
                'longitude'=>$request->longitude,
            ]);

        }
        return redirect('/shop/configurations');
    }
}
