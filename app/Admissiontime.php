<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Admissiontime extends Model
{

    protected $table='admissiontimes';

   protected $fillable = [
 'admissiondate','patientprofile_id'
    ];

   
    protected $hidden = [
        
    ];

 


}
