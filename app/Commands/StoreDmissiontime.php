<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\User;
use App\Patientprofile;
use App\Dmissiontime;
class StoreDmissiontime extends Command implements SelfHandling{




public $Dmissiontime;
public $profile_id;




public function __construct($Dmissiontime,$profile_id)
{
$this->Dmissiontime=$Dmissiontime;
$this->profile_id=$profile_id;




}

public function handle()
{




return Dmissiontime::create([
'dmissiondate'=>$this->Dmissiontime,
'patientprofile_id'=>$this->profile_id,





]);













}






}
