<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserFamilyDetails extends Model
{
  protected $fillable = [
      'userId', 'fatherStatus','motherStatus', 'familyLocation','nativePlace','sibling','familyType'
  ];
}
