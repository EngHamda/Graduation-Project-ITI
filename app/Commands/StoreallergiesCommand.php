<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Allergy;
class StoreallergiesCommand extends Command implements SelfHandling{



public $allergiesdate;
public $allergieshistory;
public $profileid;





public function __construct($allergieshistory,$allergiesdate,$profileid)
{

$this->allergiesdate=$allergiesdate;
$this->allergieshistory=$allergieshistory;
$this->profileid=$profileid;


}

public function handle()
{




return Allergy::create([
'allergydate'=>$this->allergiesdate,
'allergyinformation'=>$this->allergieshistory,
'patientprofile_id'=>$this->profileid,



]);













}






}
