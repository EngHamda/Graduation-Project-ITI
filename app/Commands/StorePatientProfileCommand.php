<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Patientprofile;

class StorePatientProfileCommand extends Command implements SelfHandling{




public $user_id;
public $patientweight;
public $patientheight;
public $patientbloodgroup;
public $patientemergencyphone;
public $patientnationality;
public $patientnationalid;


public function __construct($user_id,$patientweight,$patientheight,$patientbloodgroup,$patientemergencyphone,$patientnationality,$patientnationalid)
{

$this->user_id=$user_id;
$this->patientweight=$patientweight;
$this->patientheight=$patientheight;
$this->patientbloodgroup=$patientbloodgroup;
$this->patientemergencyphone=$patientemergencyphone;
$this->patientnationality=$patientnationality;
$this->patientnationalid=$patientnationalid;



}

public function handle()
{




return Patientprofile::create([


'user_id'=>$this->user_id,
'patientweight'=>$this->patientweight,
'patientheight'=>$this->patientheight,
'patientbloodgroup'=>$this->patientbloodgroup,
'patientemergencyphone'=>$this->patientemergencyphone,
'patientnationality'=>$this->patientnationality,
'patientnationalid'=>$this->patientnationalid,


]);













}






}
