<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
  public function user()
  {
    return $this->belongsto(User::class, 'user_id', 'id');
  }

  public function activity()
  {
    return $this->belongsto(Activity::class, 'activity_id', 'id');
  }
  protected $fillable = [
    'text',
    'user_id',
    'activity_id'
  ];
}
