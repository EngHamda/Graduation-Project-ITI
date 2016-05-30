<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use App\Commands\ConfirmRequestCommand;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Auth;
use App\Medicalcompany;
use App\Advertisementrequest;
class MedicalcompanyController extends Controller
{
    public function __construct()
{
//$this->middleware('auth');
}







public function index()
{
$id=auth()->guard('medicalcompany')->user()->id;
$requests=Advertisementrequest::where('medicalcompany_id','=',1)->get();

return view('medicalcompany.index',compact('requests','id'));
}


public function logout()
{

auth()->guard('medicalcompany')->logout();
return redirect('/medicalcompany/login');
}



public function confirm($id)
{

  
       

     
$command=new ConfirmRequestCommand($id);

$this->dispatch($command);

 return redirect('medicalcompany')->with('status', 'request confirm');



}



public function login()
{

return view('medicalcompany.auth.medicalcompanylogin');
}


public function postLogin(Request $request)
{


/*$validator = Validator::make($request->all(), [
            'email' => 'required|unique:posts|max:255',
            'password' => 'required',
        ]);*/


print_r($request->all());

      /*  if ($validator->fails()) {
            return redirect('/medicalcompany/login')
                        ->withErrors($validator)
                        ->withInput();
        }

*/










/*
$validator=Validator($request->all(),
[
'email'=>'required',
'password'=>'required'

]);

if($validator->fails())
{
return redirect('/medicalcompany/login')
       ->withErrors($validator)
       ->withInput() ;   
 




/
  //    $this->validate($request,[
    //     'username'=>'required|max:8',
       //  'password'=>'required'
     // ]);





}
*/
$credientials=['email'=> $request->get('email'),'password'=>$request->get('password')];
if(auth()->guard('medicalcompany')->attempt($credientials))
{
return redirect('/medicalcompany');
}


else{
return redirect('/medicalcompany/login')
       ->withErrors(['error'=>'login invalid'])
       ->withInput() ;   

}





}

}
