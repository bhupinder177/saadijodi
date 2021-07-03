<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserEducations extends Model
{
  protected $fillable = [
      'userId', 'highestQualification','workingWith', 'workingAs','employerName','income'
  ];
}
