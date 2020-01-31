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

Route::get('/', 'UserController@index');


Route::prefix('states')->group(function () {
    Route::get('create', 'StateController@create');
    Route::get('/', 'StateController@show');
    Route::get('/{resource_id}', 'StateController@get_state');
    Route::get('/locals/{state_id}', 'LocalGovtController@state_locals');
    Route::get('/cities/{state_id}', 'CityController@state_cities');
});
Route::resource('user', 'UserController');
Route::post('case/{user_id}', 'UserCriminalCaseController@store')->name('case.save');
Route::get('case/{user_id}', 'UserCriminalCaseController@create')->name('case.create');
Route::get('case/{user_id}/{id}/edit', 'UserCriminalCaseController@edit')->name('case.edit');
Route::post('case/{id}/update', 'UserCriminalCaseController@update')->name('case.update');
Route::get('case/{id}/delete', 'UserCriminalCaseController@destroy')->name('case.delete');
Route::get('case/{user_id}/{id}/show', 'UserCriminalCaseController@show')->name('case.show');
