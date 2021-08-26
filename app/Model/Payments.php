<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Payments extends Model
{

  protected $fillable = [
      'userId','coupon','amount','packageId'

  ];

  public function user()
  {
      return $this->hasOne('App\Model\User','id','userId');
  }

}
