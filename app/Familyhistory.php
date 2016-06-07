<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Familyhistory extends Model
{
    protected $table="familyhistories";
    protected $fillable=['patientprofile_id','familyhistory'];
    protected $hidden=[];

  

    
}
