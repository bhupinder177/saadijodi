<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Qualification extends Model
{
  protected $fillable = [
      'name'
  ];

  public function detail()
  {
      return $this->hasMany('App\Model\UserEducations','highestQualification','id');
  }

}
