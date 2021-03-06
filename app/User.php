<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

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
      return $this->hasMany(Comment::class, 'user_id', 'id');
    }

    public function activities()
    {
      return $this->belongsToMany(Activity::class, 'activity_user', 'user_id', 'activity_id');
    }

    // public function movies()
  	// {
  	// 	return $this->belongsToMany(Movie::class, 'actor_movie', 'actor_id', 'movie_id');
  	// }




    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'name',
      'email',
      'password',
      'nickname',
      'image',
      'target',
      'city_id',

    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token', 'password'
    ];
}
