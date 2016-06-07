<?php

namespace App;

use Illuminate\Database\Eloquent\Model;



class Bloodtransfer extends Model
{
    protected $table="bloodtransfers";
    protected $fillable=['bloodtransferdate','patientprofile_id','bloodtransfer'];
    protected $hidden=[];

  

    
}
