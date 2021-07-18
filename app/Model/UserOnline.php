<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserOnline extends Model
{
  protected $fillable = [
      'userId', 'date'
  ];
}
