<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Surgicalhistory extends Model
{
    protected $table="surgicalhistories";
    protected $fillable=['surgicaldate','surgicalinformation','patientprofile_id'];
    protected $hidden=[];

    
}
