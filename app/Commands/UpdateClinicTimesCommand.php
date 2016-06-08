<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\ClinicTimes;

class UpdateClinicTimesCommand  extends Command implements SelfHandling {
    
    //"clinic_id":"1","physician_id":"3","day":"4","start":"12:00","end":"15:00"
    public $clinic_id   ;
    public $physician_id;
    public $day         ;
    public $start       ;
    public $end         ;
    
    public function __construct($clinic_id, $physician_id, $day, $start, $end) {
        
        $this->clinic_id       = $clinic_id     ;
        $this->physician_id    = $physician_id  ;
        $this->day             = $day           ;
        $this->start           = $start         ;
        $this->end             = $end           ;
        
    }
    
    public function handle() {
        return ClinicTimes::create([
            'clinic_id'   => $this->clinic_id, 
            'physician_id'=> $this->physician_id, 
            'day'         => $this->day, 
            'start'       => $this->start, 
            'end'         => $this->end 
        ]);
        
    }
}