<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Speciality extends Model
{
    //
//    protected $table = 'specialities';
//    protected $fillable = [
//    ];
//    protected $hidden = [
//    ];
    public function Questions() {
        
        return $this->belongsToMany('\App\Question')->withTimestamps();
    }

    
}
