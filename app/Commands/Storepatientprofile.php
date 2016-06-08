<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Pasthistory;
class Storepatientprofile extends Command implements SelfHandling{



public $pasthistorydate;
public $pasthistory;
public $userid;





public function __construct($pasthistorydate,$pasthistory,$profileid)
{

$this->pasthistorydate=$pasthistorydate;
$this->pasthistory=$pasthistory;
$this->profileid=$profileid;


}

public function handle()
{




return Pasthistory::create([
'pasthistorydate'=>$this->pasthistorydate,
'historyinformation'=>$this->pasthistory,
'patientprofile_id'=>$this->profileid,



]);













}






}
