<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Favourite extends Model
{
  protected $fillable = [
      'userId','favoriteUserId'
  ];

  public function userdetail()
  {
      return $this->hasOne('App\Model\User','id','favoriteUserId');
  }

}
