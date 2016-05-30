<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Patientprofile extends Model
{
  



protected $fillable = [
 'patientweight','patientheight' ,'patientbloodgroup' ,'patientemergencyphone' ,'patientnationality','patientnationalid' ,'user_id',
    ];

   
    protected $hidden = [
        
    ];

 public function Medicalcompany()
    {
        return $this->belongsTo('App\User');
    }




}
