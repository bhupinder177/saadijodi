<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PartnerPreferences extends Model
{
  protected $fillable = [
      'userId', 'ageMin','ageMax', 'heightMin','heightMax','martialStatus','country','state','highestQualification','workingWith','income','diet','religion','community','motherTongue'
  ];
}
