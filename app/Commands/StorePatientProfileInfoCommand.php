<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\User;
use App\Patientprofile;

class StorePatientProfileInfoCommand extends Command implements SelfHandling{




public $patientwheight;
public $userid;
public $patientheight;
public $bloodgroup;
public $emergencyphone;
public $nationality;
public $nationalid;
public function __construct($patientwheight,$userid,$patientheight,$bloodgroup,$emergencyphone,$nationality,$nationalid)
{
$this->patientwheight=$patientwheight;
$this->userid=$userid;
$this->patientwheight=$patientwheight;
$this->patientheight=$patientheight;
$this->bloodgroup=$bloodgroup;
$this->emergencyphone=$emergencyphone;
$this->nationality=$nationality;
$this->nationalid=$nationalid;



}

public function handle()
{




return Patientprofile::create([
'user_id'=>$this->userid,
'patientweight'=>$this->patientwheight,
'patientheight'=>$this->patientheight,
'patientbloodgroup'=>$this->bloodgroup,
'patientemergencyphone'=>$this->emergencyphone,
'patientnationality'=>$this->nationality,
'patientnationalid'=>$this->nationalid,







]);













}






}
