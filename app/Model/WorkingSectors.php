<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class WorkingSectors extends Model
{
  protected $fillable = [
      'name'
  ];

  public function detail()
  {
      return $this->hasMany('App\Model\UserEducations','workingAs','id');
  }

}
