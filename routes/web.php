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
Route::get('/home', 'HomeController@home');
Route::get('/about_us', function(){
	return view('about_us');
});

Route::prefix('states')->group(function () {
    Route::get('create', 'StateController@create');
    Route::get('/', 'StateController@show');
    Route::get('/{resource_id}', 'StateController@get_state');
    Route::get('/locals/{state_id}', 'LocalGovtController@state_locals');
    Route::get('/cities/{state_id}', 'CityController@state_cities');
});
Route::resource('user', 'UserController');
