<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class UserPackage extends Model
{
    //
    protected $fillable = [
        'userId', 'packageId','price', 'chat','connects','phoneNumberDisplay','duration','status','packageEnd'
    ];


}
