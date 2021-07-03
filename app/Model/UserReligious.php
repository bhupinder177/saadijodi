<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserReligious extends Model
{
  protected $fillable = [
      'userId', 'religion','motherTongue', 'community','subCommunity'
  ];
}
