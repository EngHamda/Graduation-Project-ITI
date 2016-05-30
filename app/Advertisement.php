<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    


protected $fillable = [
 'advertisementname','advertisementpath'    
    ];

   
    protected $hidden = [
        
    ];

 public function Medicalcompany()
    {
        return $this->belongsTo('App\Medicalcompany');
    }


public function physiciandetails()
    {
        return $this->belongsTo('App\Physiciandetails');
    }



}
