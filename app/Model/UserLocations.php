<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserLocations extends Model
{
  protected $fillable = [
      'userId', 'country','state','city','pincode'
  ];

  public function countrydetail(){
    return $this->belongsTo('App\Model\Country', 'country', 'id');
  }

  public function statedetail(){
    return $this->belongsTo('App\Model\States', 'state', 'id');
  }

  public function citydetail(){
    return $this->belongsTo('App\Model\Cities', 'city', 'id');
  }

}
