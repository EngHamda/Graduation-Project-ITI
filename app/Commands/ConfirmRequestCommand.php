<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Advertisementrequest;

class ConfirmRequestCommand extends Command implements SelfHandling{
public $id;


public function __construct($id)
{
$this->id=$id;


}

public function handle()
{

return Advertisementrequest::where('id',$this->id)->update(array(
'confirmed'=>1










));













}






}
