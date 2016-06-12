<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Accident;
class StoreAccidentCommand extends Command implements SelfHandling{



public $accedentdate;
public $accedenthistory;
public $profileid;





public function __construct($accedenthistory,$accedentdate,$profileid)
{

$this->accedentdate=$accedentdate;
$this->accedenthistory=$accedenthistory;
$this->profileid=$profileid;


}

public function handle()
{




return Accident::create([
'accedentdate'=>$this->accedentdate,
'accedentinformation'=>$this->accedenthistory,
'patientprofile_id'=>$this->profileid,



]);













}






}
