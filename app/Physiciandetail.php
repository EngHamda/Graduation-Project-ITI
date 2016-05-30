<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Physiciandetail extends Model
{
    
public function user()
    {
        return $this->belongsTo('App\User');
    }

public function advertisement()
    {
        return $this->hasMany('App\Advertisementrequest');
    }


}
