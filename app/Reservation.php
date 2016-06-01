<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    protected $table = 'reservations';
    protected $fillable = [
        'patient_id', 'physician_id', 'clinic_id', 
        'reservation_day', 'reservation_time'
//reservation_day, ['Saturday', 'Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Sunday'],
//reservation_time, ['00:00-03:00','04:00-08:00'],
//id, reservation_number,'reservation_confirmed',['unconfirmed','confirmed'],timestamps
//'patient_id','physician_id','clinic_id'
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
        
        return $this->belongsTo('\App\Clinics');
    }
    public function physician() {
        
        return $this->belongsTo('\App\User');
    }
}
