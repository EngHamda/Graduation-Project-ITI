<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Advertisementrequest;

class StoreDoctorRequestCommand extends Command implements SelfHandling{




public $medicalid;
public $advertisementid;
public $dateandtime;
public $dictordetailsid;


public function __construct($medicalid,$advertisementid,$dateandtime,$dictordetailsid)
{
$this->medicalid=$medicalid;
$this->advertisementid=$advertisementid;
$this->dateandtime=$dateandtime;
$this->dictordetailsid=$dictordetailsid;



}

public function handle()
{




return Advertisementrequest::create([

'physiciandetail_id'=>$this->dictordetailsid,
'medicalcompany_id'=>$this->medicalid,
'advertisement_id'=>$this->advertisementid,
'advertisementrequstdate'=>$this->dateandtime,


]);













}






}
