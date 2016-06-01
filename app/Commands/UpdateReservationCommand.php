<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Reservation;

class UpdateReservationCommand  extends Command implements SelfHandling {
    
    public $id                   ;
    public $patient_id           ;
    public $clinic_id            ;
    public $physician_id         ;
    public $reservation_day      ;
    public $reservation_time     ;
    public $reservation_confirmed;
    public $reservation_number   ;
    public function __construct($patient_id, $physician_id, $clinic_id, $reservation_day, $reservation_time, $reservation_confirmed, $reservation_number, $id) {
        
        $this->id                   = $id                   ;
        $this->patient_id           = $patient_id           ;
        $this->clinic_id            = $clinic_id            ;
        $this->physician_id         = $physician_id         ;
        $this->reservation_day      = $reservation_day      ;
        $this->reservation_time     = $reservation_time     ;
        $this->reservation_confirmed= $reservation_confirmed;
        $this->reservation_number   = $reservation_number   ;
        
    }
    
    public function handle() {
        return Reservation::where('id', $this->id)-> update([
            
            'patient_id'           => $this->patient_id, 
            'physician_id'         => $this->physician_id, 
            'clinic_id'            => $this->clinic_id, 
            'reservation_day'      => $this->reservation_day,
            'reservation_time'     => $this->reservation_time,
            'reservation_confirmed'=> $this->reservation_confirmed, 
            'reservation_number'   => $this->reservation_number
            ]);
    }
}