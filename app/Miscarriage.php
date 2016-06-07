<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Miscarriage extends Model
{
    protected $table="miscarriages";
    protected $fillable=['miscarriagedate','patientprofile_id','miscarriage'];
    protected $hidden=[];

  

    
}
