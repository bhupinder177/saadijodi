<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
  protected $fillable = [
      'userId','message','roomId','is_read'
  ];


  public function user(){
    return $this->belongsTo('App\Model\User','userId','id');
  }

}
