<?php

namespace  App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Advice;


class DestroyAdviceCommand extends command implements  SelfHandling{
    public $id;


    public function __construct($id)
    {
        $this->id=$id;


    }

    public function handle(){
        return Advice::where('id',$this->id)->delete();



    }
}
