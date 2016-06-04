<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use App\Http\Requests;
use App\Commands\StorePatientProfile;
use App\Commands\StorePatientProfiletwo;
use App\Commands\StoreDmissiontime;
use App\Commands\UpdatePatientProfileCommand;
use App\Commands\AddnewAdmissionCommand;
use App\Commands\InsertPatientProfile;
use App\Commands\UpdatePatientProfile;
use App\Http\Requests\storeRequest;
use App\User;
use App\Patientprofile;
use App\Reservation;
class AssistantController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()


    {
        $reservations = Reservation::orderBy('reservation_day', 'asc')
                ->orderBy('reservation_confirmed', 'asc')
               ->orderBy('reservation_number', 'asc')
                ->get();//array of selected columns

     return view('assistantprofile', compact('reservations'));//,'patient_names'));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(storeRequest $request)
    {
        


 $name=$request->input('name');
 $email=$request->input('email');
 $password=$request->input('password');
 $password=Hash::make($password); 
 $phone=$request->input('phone');  
 $dateofbirth=$request->input('dateofbirth');
 $dateofbirth= date('Y-m-d', strtotime($dateofbirth));
$buildingnumber=$request->input('buildingnumber');
$street=$request->input('street');
$city=$request->input('city');
$country=$request->input('country');
$profilepicture=$request->file('profilepicture');

      if($profilepicture){
$main_image_filename=$profilepicture->getClientOriginalName();
$profilepicture->move(public_path('images'),$main_image_filename);
}



else{

$profilepicture="none.jpg";

}
 $patientwheight =$request->input('patientweight');
 $patientheight =$request->input('patientheight');
$bloodgroup=$request->input('bloodgroup');
$emergencyphone=$request->input('emergencyphone');
$nationality=$request->input('nationality');
$nationalid=$request->input('nationalid');
 $roleid=2;
$gender=$request->input('gender');
 $Dmissiontime=$request->input('Dmissiontime');
 $Dmissiontime= date('Y-m-d', strtotime($Dmissiontime));
$command=new StorePatientProfile($name,$email,$password,$dateofbirth,$gender,$phone,$buildingnumber,$street,$city,$profilepicture,$roleid,$country);



$this->dispatch($command);

$user=User::where('email',$email)->first();
//var_dump($user->id);
$userid=$user->id;
$command2=new StorePatientProfiletwo($patientwheight,$userid,$patientheight,$bloodgroup,$emergencyphone,$nationality,$nationalid);
$this->dispatch($command2);

$profile=Patientprofile::where('user_id',$userid)->first();
$profileid=$profile->id;
var_dump($profileid);
$command3=new StoreDmissiontime($Dmissiontime,$profileid);
$this->dispatch($command3);
 return redirect('assistant')->with('status', 'patient profile update');





















    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        

$name=$request->input('name');
        $birth_date=$request->input('birth_date');
$birth_date= date('Y-m-d', strtotime($birth_date));
        $gender=$request->input('gender');
        $phone=$request->input('phone');
        $buildingnumber=$request->input('buildingnumber');
        $street=$request->input('street');
        $city=$request->input('city');
        $country=$request->input('country');
        $main_image=$request->file('main_image');
        $patientweight=$request->input('patientweight');
        $patientheight=$request->input('patientheight');
        $patientbloodgroup=$request->input('patientbloodgroup');
        $patientemergencyphone=$request->input('patientemergencyphone');
        $patientnationality=$request->input('patientnationality');
        $patientnationalid=$request->input('patientnationalid');
        $role_id=2;
   $Dmissiontime=$request->input('admission') ; 
 $Dmissiontime= date('Y-m-d', strtotime( $Dmissiontime));  
$current_image_filename =User::find($id)->profile_picture;

      if($main_image){
$main_image_filename=$main_image->getClientOriginalName();
$main_image->move(public_path('images'),$main_image_filename);
}



else{

$main_image_filename=$current_image_filename;

}
$user_id=$id;
$user=User::find($id);
$profileid=$user->patientprofile;
$command=new UpdatePatientProfileCommand($role_id,$name,$birth_date,$gender, $phone,$buildingnumber, $street,$city,$country,$current_image_filename,$id);

$this->dispatch($command);

if($profileid)
{
$profileid=$profileid->id;
$commandtwo=new UpdatePatientProfile($profileid,$user_id,$patientweight,$patientheight,$patientbloodgroup,$patientemergencyphone,$patientnationality,$patientnationalid);
$this->dispatch($commandtwo);
$commandthree=new AddnewAdmissionCommand($Dmissiontime,$profileid);
$this->dispatch($commandthree);
return redirect('assistant')->with('status', 'patient profile update');
}


if(!$profileid)
{
$commandtwo=new InsertPatientProfile($user_id,$patientweight,$patientheight,$patientbloodgroup,$patientemergencyphone,$patientnationality,$patientnationalid);
$this->dispatch($commandtwo);
$user=User::find($id);
$profileid=$user->patientprofile->id;
$commandthree=new AddnewAdmissionCommand($Dmissiontime,$profileid);
$this->dispatch($commandthree);
return redirect('assistant')->with('status', 'patient profile update');

}







    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

   public function search(Request $request)
{

$email=$request->input('email');
$user = User::where('email', $email)->first();


if($user)
{

if($user->role_id==2)
{
$patientprofile=$user->patientprofile;

return view('editpatientprofile',compact('user','patientprofile'));

}

if($user->role_id==5)
{

return view('changeguestpatienttopatient',compact('user'));

}

else{

return redirect('/assistant')->with('status', 'this email not found');
}


}


else{

return redirect('/assistant')->with('status', 'this email not found');
}



}






}
