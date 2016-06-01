<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    protected $table = 'questions';
    protected $fillable = [
        'question_code', 'question_specific', 'question_detail', 'patient_id', 
//        'is_private', 'is_answered'
//        *  id, question_code, question_specific, question_detail
//        *  is_private, is_answered, patient_id, created_at, updated_at
    ];
    protected $hidden = [
       // 'password', 'remember_token',
    ];
    public function patient() {
        
        return $this->belongsTo('\App\User');
    }
    public function answers() {
        
        return $this->hasMany('\App\Answer');
    }
//    public function question_attachments() {
//        
//        return $this->hasMany('\App\QuestionAttachment');
//    }
    public function specialities() {
        
//        return $this->belongsToMany('\App\Speciality');
        return $this->belongsToMany('App\Speciality', 'question_speciality', 'speciality_id', 'question_id');
        //user is question&role is spec.
//        $user = App\User::find(1);
//
//        foreach ($user->roles as $role) {
//            //
//        }
        //$roles = App\User::find(1)->roles()->orderBy('name')->get();
    }
}//questionattachments,questionspecialties

//class QuestionAttachment extends Model
//{
//    protected $table = 'questionattachments';
//    protected $fillable = [
//        'attachment_name', 'attachment_path', 'question_id'
////        *  id, question_id, attachment_name, attachment_path
////        *  created_at, updated_at
//    ];
//    protected $hidden = [
//       // 'password', 'remember_token',
//    ];
//    public function question() {
//        
//        return $this->belongsTo('\App\Question');
//    }
//}
//class QuestionSpecialty extends Model
//{
//    protected $table = 'questionspecialties';
//    protected $fillable = [
//        'speciality_id', 'question_id'
////        *  id, speciality_id, question_id
////        *  created_at, updated_at
//    ];
//    protected $hidden = [
//       // 'password', 'remember_token',
//    ];
//    public function question() {
//        
//        return $this->belongsTo('\App\Question');
//    }
//    public function speciality() {
//        
//        return $this->belongsTo('\App\Question');// must be $this->belongsTo('\App\Speciality');
//    }
//}
