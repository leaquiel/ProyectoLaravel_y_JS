<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  public function cities()
  {
    return $this->hasMany(City::class, 'country_id', 'id');
  }

  public function activities()
  {
    return $this->hasMany(Activity::class, 'country_id', 'id');
  }
  public function users()
  {
    return $this->hasMany(User::class, 'country_id', 'id');
  }

}
