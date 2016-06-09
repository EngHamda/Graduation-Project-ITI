<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ClinicTimes extends Model
{
    protected $table = 'clinictimes';
    protected $fillable = [
        'physician_id', 'clinic_id', 
        'day', 'start', 'end'
        ];
    protected $hidden = [];
    public function clinic() {
        
        return $this->belongsTo('\App\Clinics');
    }
    public function physician() {
        
        return $this->belongsTo('\App\User');
    }
}
