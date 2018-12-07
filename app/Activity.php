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

  public function comments()
  {
    return $this->hasMany(Comment::class, 'activity_id', 'id');
  }

  public function users()
  {
    return $this->belongsToMany(User::class, 'activity_user', 'activity_id', 'user_id');
  }

  // public function movies()
	// {
	// 	return $this->belongsToMany(Movie::class, 'actor_movie', 'actor_id', 'movie_id');
	// }
}
