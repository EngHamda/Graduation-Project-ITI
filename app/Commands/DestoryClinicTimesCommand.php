<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\ClinicTimes;

class DestoryClinicTimesCommand  extends Command implements SelfHandling {
    
    public $id  ;
    public function __construct($id) {
        
        $this->id   = $id   ;
    }
    
    public function handle() {
        return ClinicTimes::where('id', $this->id)-> delete();
    }
}