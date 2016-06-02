<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

//use App\Answer;
use App\Question;

class UpdateIsanswerQuestionCommand  extends Command implements SelfHandling {
    
    public $id         ;

    public function __construct($id) {
        
        $this->id          = $id;
        $this->is_answered = "unanswered"  ;
        
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