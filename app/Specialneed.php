<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Specialneed extends Model
{
    protected $table="specialneeds";
    protected $fillable=['specialneedinformation','patientprofile_id'];
    protected $hidden=[];

  

    
}
