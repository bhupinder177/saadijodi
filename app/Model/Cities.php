<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Cities extends Model
{
  protected $fillable = [
  'name', 'state_id'
  ];
}
