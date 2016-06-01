<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Clinics extends Model {

    

    

    protected $table    = 'clinics';
    
    protected $fillable = [
          'name',
          'phone',
          'building_number',
          'street',
          'city',
          'governorate'
    ];
    

    public static function boot()
    {
        parent::boot();

        Clinics::observe(new UserActionsObserver);
    }
    public function clinicreservations() {
        
        return $this->hasMany('\App\Reservation');
    }
    
    
    
}