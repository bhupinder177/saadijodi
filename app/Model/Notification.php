<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
  protected $fillable = [
      'notificationTo','notificationFrom','notificationMessage','date','status','postId','type','bookingId','price'
  ];



  public function userdetail(){
    return $this->belongsTo('App\Model\User','notificationFrom','id');
  }

}
