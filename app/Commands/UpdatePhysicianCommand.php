<?php

namespace App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;

use App\Physician_Details;

class UpdatePhysicianCommand  extends Command implements SelfHandling {


    public $title;
    public $certification;
    public $user_id;
    public $clinic_id;
    public $speciality_id;



    public function __construct($title, $certification, $user_id,$clinic_id, $speciality_id) {


        $this->title =$title;
        $this->certification = $certification;
        $this->user_id = $user_id;
        $this->clinic_id = $clinic_id;
        $this->speciality_id = $speciality_id;



    }

    public function handle() {
        return Physician_Details::where('user_id', $this->user_id)-> update([
            'title'      => $this->title,
            'certification'     => $this->certification,
            'clinic_id'    => $this->clinic_id,
            'speciality_id'=> $this->speciality_id,

        ]);

    }
}