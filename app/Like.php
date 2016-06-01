<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

use App\User;
use App\Advice;

class Like extends Model
{
    protected $table='likes';
    protected $fillable=['user_id','advice_id','liked'];
    protected $hidden=[];
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function advice()
    {
        return $this->belongsTo('App\Advice');
    }
}
