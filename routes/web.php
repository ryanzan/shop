<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => ['auth', 'role:administrator']], function () {

    Route::get('/admin', function () {
        return view('admin.admin');
    });

    Route::resource('/admin/user', 'Admin\UsersController');
    Route::resource('/admin/clothes-type','Admin\ColthesTypesController');
    Route::resource('/admin/shops','Admin\ShopsController');

});
