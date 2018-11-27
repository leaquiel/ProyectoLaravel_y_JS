<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  public function city()
  {
    return $this->hasOne(City::class, 'id', 'city_id');
  }

  public function country()
  {
    return $this->hasOne(Country::class, 'id', 'country_id');
  }
}
