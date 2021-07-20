<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class MessageRoom extends Model
{
  protected $fillable = [
      'roomId','userId','oppositeUserId','message','last_message_at'
  ];

  public function user(){
    return $this->belongsTo('App\Model\User','userId','id');
  }


  public function oppositeUser(){
    return $this->belongsTo('App\Model\User','oppositeUserId','id');
  }



  public function unread(){
      return $this->belongsTo('App\Model\Message','roomId','roomId')->where('is_read',0)->count();
  }

}
