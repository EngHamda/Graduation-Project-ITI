<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Specialneed;
class StorespecialneedsCommand extends Command implements SelfHandling{




public $specialneed;
public $profileid;





public function __construct($specialneed,$profileid)
{

$this->specialneed=$specialneed;
$this->profileid=$profileid;


}

public function handle()
{




return Specialneed::create([

'specialneedinformation'=>$this->specialneed,
'patientprofile_id'=>$this->profileid,



]);













}






}
