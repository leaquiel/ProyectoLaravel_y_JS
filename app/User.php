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

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
      'id',
      'userName',
      'userFullName',
      'userNationality',
      'userEmail',
      'email_verified_at',
      'userTarget',
      'userQuestion',
      'userAnswer',
      'userImage'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'userPassword', 'remember_token',
    ];
}
