<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisementrequest extends Model
{
    

protected $fillable = [
 'physiciandetail_id','medicalcompany_id','advertisement_id','confirmed','advertisementrequstdate','advertisementrequsttime' 
    ];

   
    protected $hidden = [
        
    ];



public function physiciandetail()
    {
        return $this->belongsTo('App\Physiciandetail');
    }






    
}
