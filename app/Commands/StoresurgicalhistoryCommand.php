<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Surgicalhistory;
class StoresurgicalhistoryCommand extends Command implements SelfHandling{



public $surgicalhistorydate;
public $surgicalhistory;
public $profileid;





public function __construct($surgicalhistory,$surgicalhistorydate,$profileid)
{

$this->surgicalhistorydate=$surgicalhistorydate;
$this->surgicalhistory=$surgicalhistory;
$this->profileid=$profileid;


}

public function handle()
{




return Surgicalhistory::create([
'surgicaldate'=>$this->surgicalhistorydate,
'surgicalinformation'=>$this->surgicalhistory,
'patientprofile_id'=>$this->profileid,



]);













}






}
