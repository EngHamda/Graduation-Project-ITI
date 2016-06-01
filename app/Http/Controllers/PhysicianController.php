<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Advertisement;
use App\Medicalcompany;
use App\user;
use App\Commands\StoreDoctorRequestCommand;
use App\Http\Requests\StoreCompanyAppointmentRequest;
class PhysicianController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $adverisements=Advertisement::where('is_paid','=',1)->get();
       
       return view('physicianprofile',compact('adverisements'));
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
    public function store(Request $request)
    {
        //
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
        //
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


   public function requestcompany($id)
  {

$advertisementid=$id;



return view('requestcompanyappointement',compact('medicalid','advertisementid'));



 }




public function storecompanyrequest(StoreCompanyAppointmentRequest $request)
{


        $advertisementid=$request->input('advertisementid');
        $advertisement=Advertisement::find($advertisementid);
$medicalid=$advertisement->Medicalcompany->id;
        $date=$request->input('date');
  $date = date('Y-m-d', strtotime($date));
$time=$request->input('time');
    $doctorid=Auth::user()->id;
      

     
$command=new StoreDoctorRequestCommand($medicalid,$advertisementid,$date,$doctorid,$time);

$this->dispatch($command);

 return redirect('physician')->with('status', 'request sent');




}







}
