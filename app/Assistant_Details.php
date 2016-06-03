<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Assistant_Details extends Model
{
    protected $table = 'assistantdetails';

    protected $fillable = ['clinic_id','user_id'];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
