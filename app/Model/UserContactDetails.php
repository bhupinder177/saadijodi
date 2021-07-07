<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserContactDetails extends Model
{
  protected $fillable = [
      'userId','mobile','nameContactPerson','relationWithMember'
  ];
}
