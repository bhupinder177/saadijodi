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

  public function religiondetail()
  {
      return $this->hasOne('App\Model\Religion','id','religion');
  }

  public function communitydetail()
  {
      return $this->hasOne('App\Model\Community','id','community');
  }

  public function motherTonguedetail()
  {
      return $this->hasOne('App\Model\MotherTongue','id','motherTongue');
  }

  public function educationdetail()
  {
      return $this->hasOne('App\Model\Qualification','id','highestQualification');
  }

  public function workingAsdetail()
  {
      return $this->hasOne('App\Model\WorkingSectors','id','workingAs');
  }
  
}
