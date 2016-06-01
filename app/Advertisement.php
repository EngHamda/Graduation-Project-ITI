<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;




class Advertisement extends Model {

    

    

    protected $table    = 'advertisement';
    
    protected $fillable = [
          'name','path', 'is_paid','medicalcompany_id',
    ];
    

    public static function boot()
    {
        parent::boot();

        Advertisement::observe(new UserActionsObserver);
    }
    
    
    
    
}