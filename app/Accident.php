<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Accident extends Model
{
    protected $table="accedents";
    protected $fillable=['accedentdate','patientprofile_id','accedentinformation'];
    protected $hidden=[];

  

    
}
