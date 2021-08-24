<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class MotherTongue extends Model
{
  protected $fillable = [
  'name'
  ];

  public function religiondetail()
  {
      return $this->hasMany('App\Model\UserReligious','motherTongue','id');
  }

}
