<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserImages extends Model
{
  protected $fillable = [
      'userId', 'image','isProfile'
  ];
}
