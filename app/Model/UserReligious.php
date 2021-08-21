<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserReligious extends Model
{
  protected $fillable = [
      'userId', 'religion','motherTongue', 'community','subCommunity'
  ];

  public function religiondetail()
  {
      return $this->hasOne('App\Model\Religion','id','religion');
  }

  public function communitydetail()
  {
      return $this->hasOne('App\Model\Community','id','community');
  }

  public function motherTonguedetail()
  {
      return $this->hasOne('App\Model\MotherTongue','id','motherTongue');
  }

}
