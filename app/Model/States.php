<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class States extends Model
{
  protected $fillable = [
  'name', 'country_id','timezone'
  ];
}
