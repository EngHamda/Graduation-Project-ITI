<?php

namespace App\Http\Controllers;


use App\Prescription;
use Illuminate\Http\Request;
use App\Commands\StorePastHistoryCommand;
use App\Commands\StoresurgicalhistoryCommand;
use App\Commands\StoreallergiesCommand;
use App\Commands\StoreAccidentCommand;
use App\Commands\StorespecialneedsCommand;
use App\Commands\StorefamilyhistoryCommand;
use App\Commands\StorebloodtransferCommand;
use App\Commands\StoreprescriptionCommand;
use App\Http\Requests;
use App\User;
use App\Commands\StoremiscarriagesCommand;
use App\Patientprofile;
use App\Pasthistory;
use App\Surgicalhistory;
use App\Allergy;
use App\Accident;
use App\Familyhistory;
use App\Specialneed;
use App\Bloodtransfer;
use App\Miscarriage;
use Illuminate\Support\Facades\Session;
class PatientprofilesController extends Controller
{

        public function index(Request $request)
        {
            $email = 'patient@gmail.com';
            $user = User::where('email', $email)->first();

            $user_id =$user->id;

            $basicinfos = Patientprofile::where('user_id',$user_id)->first();

            $profile_id = $basicinfos->id;

            $pasthistories = Pasthistory::where('patientprofile_id',$profile_id)->get();

            $surgicalhistories = Surgicalhistory::where('patientprofile_id',$profile_id)->get();

            $accidents =Accident::where('patientprofile_id',$profile_id)->get();
            $allergies = Allergy::where('patientprofile_id',$profile_id)->get();
            $specialneeds = Specialneed::where('patientprofile_id',$profile_id)->get();
            $bloodtransfusions = Bloodtransfer::where('patientprofile_id',$profile_id)->get();
            $familyhistories = Familyhistory:: where('patientprofile_id',$profile_id)->get();
            $miscarriages = Miscarriage::where('patientprofile_id',$profile_id)->get();
            $prescriptions = Prescription::where('patientprofile_id',$profile_id)->get();
            return view('patientprofile',compact('user','basicinfos','pasthistories','surgicalhistories','allergies','accidents','specialneeds','bloodtransfusions','familyhistories','miscarriages','prescriptions'));

        }
    



public function insertpatientprofile(Request $request)
{

                $patientemailjson=$request->input('patientemailjson');
                $patientemailarray  = json_decode($patientemailjson, true);
                $email=$patientemailarray[0];


                $user=User::where('email',$email)->first();
                if($user)
                {
                $userid=$user->id;
                $profile=Patientprofile::where('user_id',$userid)->first();
                }
                else
                {


                $Response   = array(
                            'success' => '1',
                        );
                return $Response;

                }
                if($profile)
                {

                $profileid=$profile->id;
                $pasthistoryjson=$request->input('pasthistoryjson');
                $pasthistoryarray  = json_decode($pasthistoryjson, true);
                $pasthistoryCount  = count($pasthistoryarray);
                $pasthistorydatejson=$request->input('pasthistorydatejson');
                $pasthistorydatearray = json_decode($pasthistorydatejson, true);

                for($i=0; $i<$pasthistoryCount  ;$i++)


                {

                        $command=new StorePastHistoryCommand($pasthistorydatearray[$i],$pasthistoryarray[$i],$profileid);

                        $this->dispatch($command);

                }



                $surgicalhistoryjson=$request->input('surgicalhistoryjson');
                $surgicalhistoryarray  = json_decode($surgicalhistoryjson, true);
                $surgicalhistorydatejson=$request->input('surgicalhistorydatejson');
                $surgicalhistorydatearray  = json_decode($surgicalhistorydatejson, true);
                $Count  = count($surgicalhistorydatearray);

                for($c=0; $c<$Count  ;$c++){
                        $command=new StoresurgicalhistoryCommand($surgicalhistoryarray[$c],$surgicalhistorydatearray[$c],$profileid);
                        $this->dispatch($command);
                }
                $allergiesjson=$request->input('allergiesjson');
                $allergiesarray  = json_decode($allergiesjson, true);
                $allergiesdatejson=$request->input('allergiesdatejson');
                $Count  = count($allergiesarray);
                $allergiesdatearray  = json_decode($allergiesdatejson, true);

                for($c=0; $c<$Count  ;$c++)
                {
                        $command=new StoreallergiesCommand($allergiesarray [$c],$allergiesdatearray[$c],$profileid);
                        $this->dispatch($command);
                }
                $accedentjson=$request->input('accedentjson');
                $accedentarray  = json_decode($accedentjson, true);
                $accedentdatejson=$request->input('accedentdatejson');
                $Count  = count($accedentarray);
                $accedentdatearray  = json_decode($accedentdatejson, true);

                for($c=0; $c<$Count  ;$c++)
                {
                        $command=new StoreAccidentCommand($accedentarray [$c],$accedentdatearray[$c],$profileid);
                        $this->dispatch($command);
                }
                $specialneedsjson=$request->input('specialneedsjson');
                $specialneedsarray  = json_decode($specialneedsjson, true);
                $Count  = count($specialneedsarray);

                for($c=0; $c<$Count  ;$c++)
                {
                        $command=new StorespecialneedsCommand($specialneedsarray [$c],$profileid);
                        $this->dispatch($command);
                }
                $familyhistoryjson=$request->input('familyhistoryjson');
                $familyhistoryarray  = json_decode($familyhistoryjson, true);
                $Count  = count($familyhistoryarray);

                for($c=0; $c<$Count  ;$c++)
                {
                        $command=new StorefamilyhistoryCommand($familyhistoryarray [$c],$profileid);
                        $this->dispatch($command);
                }

                $bloodtransferjson=$request->input('bloodtransferjson');
                $bloodtransferarray  = json_decode($bloodtransferjson, true);
                $bloodtransferdatejson=$request->input('bloodtransferdatejson');
                $Count  = count($bloodtransferarray);
                $bloodtransferdatearray  = json_decode($bloodtransferdatejson, true);

                for($c=0; $c<$Count  ;$c++)
                {
                        $command=new StorebloodtransferCommand($bloodtransferarray [$c],$bloodtransferdatearray[$c],$profileid);
                        $this->dispatch($command);
                }
                $misjson=$request->input('misjson');
                $misarray  = json_decode($misjson, true);
                $misdatejson=$request->input('misdatejson');
                $Count  = count($misarray);
                $misdatearray  = json_decode($misdatejson, true);

                for($c=0; $c<$Count  ;$c++)
                {
                        $command=new StoremiscarriagesCommand($misarray [$c],$misdatearray[$c],$profileid);
                        $this->dispatch($command);
                }


                //$birthjson=$request->input('birthjson');
                //$birtharray  = json_decode($birthjson, true);
                //$birthdatejson=$request->input('birthdatejson');
                //$Count  = count($birtharray);
                //$birthdatearray  = json_decode($birthdatejson, true);

                //for($c=0; $c<$Count  ;$c++)
                //{
                //$command=new StoreBirthCommand($misarray [$c],$misdatearray[$c],$profileid);
                //$this->dispatch($command);
                //}





                $Response   = array(
                            'success' => '2',
                        );
                return $Response;
                }








        }





}
