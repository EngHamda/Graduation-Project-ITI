<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

use Illuminate\Auth\Authenticatable;





class MedicalCompany extends Model implements AuthenticatableContract, CanResetPasswordContract

    {

     use Authenticatable, CanResetPassword;

    protected $table    = 'medicalcompany';
    
    protected $fillable = [
          'name',
          'email',
          'password',
          'phone',
          'building_number',
          'street',
          'city',
          'governorate',
          'profile_picture'
    ];
    

    public static function boot()
    {
        parent::boot();

        MedicalCompany::observe(new UserActionsObserver);
    }
    
    /**
     * Hash password
     * @param $input
     */
    public function setPasswordAttribute($input)
    {
        $this->attributes['password'] = Hash::make($input);
    }


 
public function advertisements()
    {
        return $this->hasMany('App\Advertisement');
    }




   
    
}
