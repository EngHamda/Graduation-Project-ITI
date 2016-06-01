<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Advertisementsrequest;

class StoreDoctorRequestCommand extends Command implements SelfHandling{




public $medicalid;
public $advertisementid;
public $date;
public $time;
public $doctorid;


public function __construct($medicalid,$advertisementid,$date,$doctorid,$time)
{
$this->medicalid=$medicalid;
$this->advertisementid=$advertisementid;
$this->date=$date;
$this->time=$time;
$this->doctorid=$doctorid;



}

public function handle()
{




return Advertisementsrequest::create([


'medicalcompany_id'=>$this->medicalid,
'user_id'=>$this->doctorid,
'advertisement_id'=>$this->advertisementid,
'advertisementrequstdate'=>$this->date,
'advertisementrequsttime'=>$this->time,

]);













}






}
