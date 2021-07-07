<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserLocations extends Model
{
  protected $fillable = [
      'userId', 'country','state','city','pincode'
  ];
}
