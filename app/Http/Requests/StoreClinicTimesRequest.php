<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class StoreClinicTimesRequest extends Request
{
    //
    public function authorize() {
        
        return true;//anyone can create Reservation
        
    }
    public function rules() {
        
        return [
            'physician-name'=> 'required',
            'clinic-day'    => 'required',
            'time_from'     => 'required',
            'time_to'       => 'required'
        ];//'answer-specific'=> 'required'        
    }
}
