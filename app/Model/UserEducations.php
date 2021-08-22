<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserEducations extends Model
{
  protected $fillable = [
      'userId', 'highestQualification','workingWith', 'workingAs','employerName','income'
  ];

  public function educationdetail()
  {
      return $this->hasOne('App\Model\Qualification','id','highestQualification');
  }

  public function workingAsdetail()
  {
      return $this->hasOne('App\Model\WorkingSectors','id','workingAs');
  }

}
