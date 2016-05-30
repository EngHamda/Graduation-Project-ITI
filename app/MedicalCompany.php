<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;
use Illuminate\Support\Facades\Hash; 




class MedicalCompany extends Model {

    

    

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


    
    
}