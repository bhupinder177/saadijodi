<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Community extends Model
{
  protected $fillable = [
  'name'
  ];

  public function religiondetail()
  {
      return $this->hasMany('App\Model\UserReligious','community','id');
  }


}
