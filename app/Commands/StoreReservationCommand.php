<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Reservation;

class StoreReservationCommand  extends Command implements SelfHandling {
    
    public $patient_id           ;
    public $clinic_id            ;
    public $physician_id         ;
    public $reservation_day      ;
    public $reservation_confirmed;
    public $reservation_number   ;
    public function __construct($patient_id, $physician_id, $clinic_id, $reservation_day, $reservation_confirmed, $reservation_number) {
        
        $this->patient_id           = $patient_id           ;
        $this->clinic_id            = $clinic_id            ;
        $this->physician_id         = $physician_id         ;
        $this->reservation_day      = $reservation_day      ;
        $this->reservation_confirmed= $reservation_confirmed;
        $this->reservation_number   = $reservation_number   ;
        
    }
    
    public function handle() {
        return Reservation::create([
            'patient_id'           => $this->patient_id, 
            'physician_id'         => $this->physician_id, 
            'clinic_id'            => $this->clinic_id, 
            'reservation_day'      => $this->reservation_day, 
            'reservation_confirmed'=> $this->reservation_confirmed, 
            'reservation_number'   => $this->reservation_number
            /*
             *  id, reservation_day, reservation_number, reservation_confirmed
             * patient_id, physician_id, clinic_id, created_at, updated_at
             */
        ]);
        
    }
}