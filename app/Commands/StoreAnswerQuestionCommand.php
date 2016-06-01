<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

//use App\Answer;
use App\Question;

class StoreAnswerQuestionCommand  extends Command implements SelfHandling {
    
    public $id         ;

    public function __construct($question_id) {
        
        $this->id          = $question_id;
        $this->is_answered = "answered"  ;
        
    }
    
    public function handle() {
        return Question::where('id', $this->id)-> update([
            'is_answered'   => $this->is_answered 
            /*
             * 'answer_specific', 'answer_detail', 'answer_speciality', 
             * 'question_id', 'physician_id', 'is_answered'
             */
        ]);
        
    }
}