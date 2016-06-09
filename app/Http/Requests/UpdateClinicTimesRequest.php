<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class UpdateClinicTimesRequest extends Request
{
    //
    public function authorize() {
        
        return true;//anyone can create Reservation
        
    }
    public function rules() {
        
        return [];//'answer-specific'=> 'required'        
    }
}
