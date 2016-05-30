<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Reservation;

class StoreQuestionCommand  extends Command implements SelfHandling {
    
    public $question_code       ;
    public $question_specific   ;
    public $question_detail     ;
    public $is_private          ;
    public $is_answered         ;
    public $patient_id          ;
    public function __construct($question_code, $question_specific, $question_detail, $is_private, $is_answered, $patient_id) {
        
        $this->question_code        = $question_code    ;
        $this->question_specific    = $question_specific;
        $this->question_detail      = $question_detail  ;
        $this->is_private           = $is_private       ;
        $this->is_answered          = $is_answered      ;
        $this->patient_id           = $patient_id       ;
        
    }
    
    public function handle() {
        return Reservation::create([
            'question_code'     => $this->question_code, 
            'question_specific' => $this->question_specific, 
            'question_detail'   => $this->question_detail, 
            'is_private'        => $this->is_private, 
            'is_answered'       => $this->is_answered, 
            'patient_id'        => $this->patient_id
            /*
             * 'question_code', 'question_specific', 'question_detail', 
             * 'patient_id', 'is_private', 'is_answered'
             */
        ]);
        
    }
}