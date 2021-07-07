<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserBasicDetails extends Model
{
  protected $fillable = [
      'userId','gender','profilecreatedby','dateOfBirth','height', 'maritalStatus','healthInformation','bloodGroup','disability','diet','about'
  ];
}
