<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Physician_Details extends Model
{
    protected $table = 'physiciandetails';

    protected $fillable = ['title','certification', 'speciality_id','clinic_id','user_id'];

    protected $hidden = [];

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
