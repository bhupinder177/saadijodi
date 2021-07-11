<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class PartnerPreferences extends Model
{
  protected $fillable = [
      'userId', 'ageMin','ageMax', 'heightMin','heightMax','maritalStatus','country','state','city','highestQualification','workingWith','income','diet','religion','community','motherTongue'
  ];

  public function countrydetail(){
    return $this->belongsTo('App\Model\Country', 'country', 'id');
  }

  public function statedetail(){
    return $this->belongsTo('App\Model\States', 'state', 'id');
  }

  public function citydetail(){
    return $this->belongsTo('App\Model\Cities', 'city', 'id');
  }
}
