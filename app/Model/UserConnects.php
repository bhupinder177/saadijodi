<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserConnects extends Model
{
  protected $fillable = [
      'userId','sendTo','connects','status'
  ];


}
