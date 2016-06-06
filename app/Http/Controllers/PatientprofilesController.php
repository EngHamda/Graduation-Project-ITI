<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Commands\Storepatientprofile;
use App\Commands\Storesurgicalhistory;
use App\Http\Requests;
use App\User;
use App\Patientprofile;
use Illuminate\Support\Facades\Session;
class PatientprofilesController extends Controller
{
    



public function insertpatientprofile(Request $request)
{

$patientemailjson=$request->input('patientemailjson');
$patientemailarray  = json_decode($patientemailjson, true);
$email=$patientemailarray[0];


$user=User::where('email',$email)->first();

$userid=$user->id;
$profile=Patientprofile::where('user_id',$userid)->first();
$profileid=$profile->id;

$pasthistoryjson=$request->input('pasthistoryjson');

$pasthistoryarray  = json_decode($pasthistoryjson, true);
$pasthistoryCount  = count($pasthistoryarray);
$pasthistorydatejson=$request->input('pasthistorydatejson');
$pasthistorydatearray = json_decode($pasthistorydatejson, true);

var_dump($pasthistorydatearray);
var_dump($pasthistoryarray);
for($i=0; $i<$pasthistoryCount  ;$i++)


{

$command=new Storepatientprofile($pasthistorydatearray[$i],$pasthistoryarray[$i],$profileid);

$this->dispatch($command);

}


$surgicalhistoryjson=$request->input('surgicalhistoryjson');

//var_dump($surgicalhistoryjson);

$surgicalhistoryarray  = json_decode($surgicalhistoryjson, true);
$surgicalhistorydatejson=$request->input('surgicalhistorydatejson');
$surgicalhistorydatearray  = json_decode($surgicalhistorydatejson, true);
//var_dump($surgicalhistorydatejson);
//var_dump($surgicalhistoryjson);
$Count  = count($surgicalhistorydatearray);
for($c=0; $c<$Count  ;$c++)


{
$command=new Storesurgicalhistory($surgicalhistoryarray[$c],$surgicalhistorydatearray[$c],$profileid);

$this->dispatch($command);

}





}



















}
