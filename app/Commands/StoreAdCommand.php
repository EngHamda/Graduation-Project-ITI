<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Advertisement;

class StoreAdCommand extends Command implements SelfHandling{




public $name;
public $path;
public $medicalcompany_id;


public function __construct($name,$path,$medicalcompany_id)
{
$this->name=$name;
$this->path=$path;
$this->medicalcompany_id=$medicalcompany_id;




}

public function handle()
{




return Advertisement::create([

'medicalcompany_id'=>$this->medicalcompany_id,
'name'=>$this->name,
'path'=>$this->path,



]);













}






}
