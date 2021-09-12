<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
  protected $fillable = [
      'name','price','description','chat','connects','phoneNumberDisplay','duration'

  ];
}
