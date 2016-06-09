<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\User;
use App\Patientprofile;
use App\Dmissiontime;
class AddnewAdmissionCommand extends Command implements SelfHandling{




public $admissiontime;
public $profile_id;




public function __construct($admissiontime,$profile_id)
{
$this->admissiontime=$admissiontime;
$this->profile_id=$profile_id;




}

public function handle()
{




return Dmissiontime::create([
'dmissiondate'=>$this->admissiontime,
'patientprofile_id'=>$this->profile_id,





]);













}






}
