<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $fillable = [
        'patient_id', 'physician_id', 'clinic_id', 'reservation_day', 'reservation_number'
        //'patient_id', 'clinic_id', 'physician_id', 'reservation_day'
//        *  id, reservation_day, reservation_number, reservation_confirmed
//        * patient_id, physician_id, clinic_id, created_at, updated_at
    ];
    protected $hidden = [
       // 'password', 'remember_token',
    ];
    public function patient() {
        
        return $this->belongsTo('\App\User');
    }
    /*
     * nourhan comment
     * @clinicmodel,physiciandeatils,patentmodel
    public function reservations() {
        
        return $this->hasMany('\App\Reservation');
    }
     */
    public function clinic() {
        
        return $this->belongsTo('\App\User');// must be $this->belongsTo('\App\Clinic');
    }
    public function physician() {
        
        return $this->belongsTo('\App\User');
    }
}
