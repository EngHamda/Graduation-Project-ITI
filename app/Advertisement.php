<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advertisement extends Model
{
    


protected $fillable = [
 'medicalcompany_id','path','name','is_paied'    
    ];

   
    protected $hidden = [
        
    ];

 public function Medicalcompany()
    {
        return $this->belongsTo('App\MedicalCompany');
    }





}
