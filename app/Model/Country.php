<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Country extends Model
{
  protected $fillable = [
  'name', 'status','code','phonecode','currencyCode','currencySymbol','timezone'
  ];
}
