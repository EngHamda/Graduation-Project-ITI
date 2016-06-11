<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Prescription;
class StoreprescriptionCommand extends Command implements SelfHandling{



public $drug;
public $duration;
public $frequency;
public $date;
public $profileid;




public function __construct($drug,$duration,$frequency,$date,$profileid)
{

$this->drug=$drug;
$this->duration=$duration;
$this->frequency=$frequency;
$this->date=$date;
$this->profileid=$profileid;
}

public function handle()
{




return Prescription::create([
'date'=>$this->allergiesdate,
'drug'=>$this->allergieshistory,
'duration'=>$this->duration,
'frequency'=>$this->frequency,
'patientprofile_id'=>$this->profileid,



]);













}






}
