<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Miscarriage;
class  StoremiscarriagesCommand extends Command implements SelfHandling{



public $miscarriagedate;
public $miscarriage;
public $profileid;





public function __construct($miscarriage,$miscarriagedate,$profileid)
{

$this->miscarriagedate=$miscarriagedate;
$this->miscarriage=$miscarriage;
$this->profileid=$profileid;


}

public function handle()
{




return Miscarriage::create([
'miscarriage'=>$this->miscarriage,
'miscarriagedate'=>$this->miscarriagedate,
'patientprofile_id'=>$this->profileid,



]);













}






}
