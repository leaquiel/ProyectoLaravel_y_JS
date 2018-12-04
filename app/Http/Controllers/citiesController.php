<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CitiesController extends Controller
{
    public function endPointAllCities()
    {
      $cities = \App\City::all();
      return $cities;
    }

    public function endPointCityByCountryId($id)
    {
      $cities = \App\City::where("country_id", $id)->get();
      return $cities;
    }

    
}
