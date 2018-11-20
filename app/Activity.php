<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
  protected $fillable = [
    'id',
    'name',
    'targets_id',
    'rangeAge',
    'city_id'
  ];
}
