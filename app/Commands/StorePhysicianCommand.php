<?php

namespace  App\Commands;


use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Physician_Details;


class StorePhysicianCommand extends command implements  SelfHandling{
    public $title;
    public $certification;
    public $speciality_id;
    public $clinic_id;
    public $user_id;


    public function __construct($title, $certification, $user_id,$clinic_id, $speciality_id)
    {
        $this->title=$title;
        $this->certification=$certification;
        $this->speciality_id=$speciality_id;
        $this->clinic_id=$clinic_id;
        $this->user_id=$user_id;


    }

    public function handle(){
        return Physician_Details::create([
                'title'=>$this->title,
                'certification'=>$this->certification,
                'user_id'=>$this->user_id,
                'clinic_id'=>$this->clinic_id,
                'speciality_id'=>$this->speciality_id,

            ]
        );
    }
}
