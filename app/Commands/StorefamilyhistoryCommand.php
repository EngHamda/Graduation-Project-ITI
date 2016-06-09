<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Familyhistory;
class StorefamilyhistoryCommand extends Command implements SelfHandling{




public $familyhistory;
public $profileid;





public function __construct($familyhistory,$profileid)
{

$this->familyhistory=$familyhistory;
$this->profileid=$profileid;


}

public function handle()
{




return Familyhistory::create([

'familyhistory'=>$this->familyhistory,
'patientprofile_id'=>$this->profileid,



]);













}






}
