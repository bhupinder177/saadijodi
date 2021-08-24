<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Religion extends Model
{
  protected $fillable = [
  'name'
  ];

  public function religiondetail()
  {
      return $this->hasMany('App\Model\UserReligious','religion','id');
  }
}
