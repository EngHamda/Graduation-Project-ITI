<?php

namespace  App\Commands;

use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Advice;


class UpdateAdviceCommand extends command implements  SelfHandling{
    public $id;
    public $advice;

    public function __construct($id,$advice)
    {
        $this->id=$id;
        $this->advice=$advice;

    }

    public function handle(){
        return Advice::where('id',$this->id)->update(array('advice'=>$this->advice));



    }
}
