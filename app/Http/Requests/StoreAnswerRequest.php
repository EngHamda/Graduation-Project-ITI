<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreAnswerRequest extends Request
{
    //
    public function authorize() {
        
        return true;//anyone can create Reservation
        
    }
    public function rules() {
        
        return [
            'answer-specific'   => 'required',
            'answer-detail'     => 'required', 
            'answer-speciality' => 'required'
        ];//'answer-specific'=> 'required'        
    }
}
