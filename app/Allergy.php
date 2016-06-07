<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Allergy extends Model
{
    protected $table="allergies";
    protected $fillable=['allergydate','patientprofile_id','allergyinformation'];
    protected $hidden=[];

  

    
}
