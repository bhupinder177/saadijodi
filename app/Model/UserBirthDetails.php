<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserBirthDetails extends Model
{
  protected $fillable = [
      'userId','birthCountry','birthCity','manglik','birthHours', 'birthminute','birthAmPm'
  ];
}
