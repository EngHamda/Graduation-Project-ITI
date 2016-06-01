<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreQuestionRequest extends Request
{
    //
    public function authorize() {
        
        return true;//anyone can create Reservation
        
    }
    public function rules() {
        
        return [];//'question-specific'=> 'required'        
    }
}
