<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Pasthistory extends Model
{
    protected $table="pasthistories";
    protected $fillable=['pasthistorydate','historyinformation','patientprofile_id'];
    protected $hidden=[];

    
}
