<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\Bloodtransfer;
class StorebloodtransferCommand extends Command implements SelfHandling{



public $bloodtransferdate;
public $bloodtransfer;
public $profileid;





public function __construct($bloodtransfer,$bloodtransferdate,$profileid)
{

$this->bloodtransferdate=$bloodtransferdate;
$this->bloodtransfer=$bloodtransfer;
$this->profileid=$profileid;


}

public function handle()
{




return Bloodtransfer::create([
'bloodtransferdate'=>$this->bloodtransferdate,
'bloodtransfer'=>$this->bloodtransfer,
'patientprofile_id'=>$this->profileid,



]);













}






}
