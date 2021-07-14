<?php

namespace App\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'firstName', 'lastName','email', 'password','type','phone','status','uniqueId','uniqueNo'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function UserBasicDetail()
    {
        return $this->hasOne('App\Model\UserBasicDetails','userId','id');
    }
    public function UserBirthDetail()
    {
        return $this->hasOne('App\Model\UserBirthDetails','userId','id');
    }
    public function UserContactDetail()
    {
        return $this->hasOne('App\Model\UserContactDetails','userId','id');
    }
    public function UserEducation()
    {
        return $this->hasOne('App\Model\UserEducations','userId','id');
    }
    public function UserFamilyDetail()
    {
        return $this->hasOne('App\Model\UserFamilyDetails','userId','id');
    }
    public function UserImage()
    {
        return $this->hasOne('App\Model\UserImages','userId','id');
    }
    public function UserLocation()
    {
        return $this->hasOne('App\Model\UserLocations','userId','id');
    }
    public function UserReligious()
    {
        return $this->hasOne('App\Model\UserReligious','userId','id');
    }

}
