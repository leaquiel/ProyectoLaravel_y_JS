<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class City extends Model
{
  public function country()
  {
    return $this->belongsto(Country::class, 'country_id', 'id');
  }

  public function activities()
  {
    return $this->hasMany(Activity::class, 'city_id', 'id');
  }

  public function users()
  {
    return $this->hasMany(User::class, 'city_id', 'id');
  }
}
