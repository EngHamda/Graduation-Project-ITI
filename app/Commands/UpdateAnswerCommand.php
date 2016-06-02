<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

use App\Answer;

class UpdateAnswerCommand  extends Command implements SelfHandling {
    
    public $id                  ;
    public $answer_specific     ;
    public $answer_detail       ;
    public $answer_speciality   ;
    public $question_id         ;
    public $physician_id        ;
    public function __construct($id, $answer_specific, $answer_detail, $answer_speciality, $question_id, $physician_id) {
        
        $this->id               = $id               ;
        $this->answer_specific  = $answer_specific  ;
        $this->answer_detail    = $answer_detail    ;
        $this->answer_speciality= $answer_speciality;
        $this->question_id      = $question_id      ;
        $this->physician_id     = $physician_id     ;
        
    }
    
    public function handle() {
        return Answer::where('id', $this->id)-> update([
            'answer_specific'=> $this->answer_specific, 
            'answer_detail'  => $this->answer_detail, 
            'speciality_id'  => $this->answer_speciality, 
            'question_id'    => $this->question_id,
            'physician_id'   => $this->physician_id
            /*
             * 'answer_specific', 'answer_detail', 'answer_speciality', 
             * 'question_id', 'physician_id', 'is_answered'
             */
        ]);
        
    }
}