<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
//    protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function redirectTo(){

        // User role
        $role = Auth::user()->role->slug;

//        dd($role);
        // Check user role
        switch ($role) {
            case 'administrator':
                return '/admin';
                break;
            case 'shop':
                return '/shop';
                break;
            default:
                return '/';
                break;
        }
    }
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
