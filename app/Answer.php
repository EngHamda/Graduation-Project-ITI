<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    protected $table = 'answers';
    protected $fillable = [
        'answer_specific', 'answer_detail', 'speciality_id', 'physician_id', 'question_id'
        //'patient_id', 'clinic_id', 'physician_id', 'reservation_day'
//        *id, answer_specific, answer_detail, question_id
//        *physician_id, created_at, updated_at
    ];
    protected $hidden = [
       // 'password', 'remember_token',
    ];
    public function question() {
        
        return $this->belongsTo('\App\Question');
    }
    public function physician() {
        
        return $this->belongsTo('\App\User');
    }
    public function speciality() {
        
        return $this->belongsTo('\App\Speciality');
    }
        
    
}
