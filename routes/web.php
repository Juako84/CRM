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
    return redirect('/login');
});

Route::get('profile', 'UserController@profile');
Route::post('profile', 'UserController@updateAvatar');
Route::post('updateBasicInfo', 'UserController@updateBasicInfo');

Auth::routes();

Route::get('/home', 'HomeController@index');
Route::get('change-password', function() {return view('user.change-password'); });
Route::post('change-password', 'Auth\UpdatePasswordController@update');

