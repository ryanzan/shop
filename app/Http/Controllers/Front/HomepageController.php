<?php

namespace App\Http\Controllers\Front;

use App\Models\Shop;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    public  function index(){
        $data['shops'] = Shop::paginate(6);
        return view('welcome',$data);
    }
}
