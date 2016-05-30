<?php

namespace  App\Commands;


use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Advice;


class StoreAdviceCommand extends command implements  SelfHandling{
    public $advice;
    public $physician_id;

    public function __construct($advice,$physician_id)
     {
    $this->advice=$advice;
    $this->physician_id=$physician_id;
     }

    public function handle(){
        return Advice::create([
            'advice'=>$this->advice,
            'user_id'=>$this->physician_id,
        ]
        );
    }
}
