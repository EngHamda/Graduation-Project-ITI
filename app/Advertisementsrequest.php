<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Advertisementsrequest extends Model
{
    

protected $fillable = [
 'user_id','medicalcompany_id','advertisement_id','isconfirmed','advertisementrequstdate','advertisementrequsttime' 
    ];

   
    protected $hidden = [
        
    ];



public function user()
    {
       return $this->belongsTo('App\User');
    }






    
}
