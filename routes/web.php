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
Route::get('/nueva', function () {
  return view('nueva');
});


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('actividades', 'ActivitiesController@index');

Route::get('/apiCities/{country_id}', function ($countryId) {
  // $cities = \App\City::all("name", "country_id");
  $cities = \App\City::where("country_id", $countryId)->get();
  return $cities;
});

Route::get('/apiCities', function () {
  $cities = \App\City::all();
  return $cities;
});
