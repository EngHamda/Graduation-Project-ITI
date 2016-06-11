<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Commands\StoreReservationCommand;
use App\Http\Requests\StoreReservationRequest;

use App\Commands\UpdateReservationCommand;
use App\Http\Requests\UpdateReservationRequest;


use App\Commands\DestoryReservationCommand;

use App\Reservation;
use App\Clinics;

use App\User;
use Auth;

use App\Physician_Details;
use App\ClinicTimes;

//use DB;
//use App\Http\Controllers\Controller;



class ReservationsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
//        $reservations = Reservation::all();
        //$clinic_id=Auth::user()->clinic_id
        $reservations = Reservation:://where('clinic_id', $clinic_id)
                                    //clinic_id for assistant login
                //->
                orderBy('reservation_day', 'asc')
                ->orderBy('reservation_time', 'asc')
                ->orderBy('reservation_confirmed', 'asc')
                ->orderBy('reservation_number', 'asc')
                ->get();//array of selected columns
//        return compact('reservations');//,'patient_names');
        return view('Reservation.index', compact('reservations'));//,'patient_names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $clinicNames = array();
        $clinicIds = array();
        $clinics = Clinics::all('id','name');
        foreach ($clinics as $clinic ){ 
            // Code Here
            array_push($clinicNames, $clinic->name);
            array_push($clinicIds, $clinic->id);
        }
        $clinicList = array_combine($clinicIds, $clinicNames);
        //$clinicList = array_fill_keys($clinicNames, $clinicNames);
        //output
            //{"clinicList":{"Clinic1":["Clinic1","Clinic2"]
            //              ,"Clinic2":["Clinic1","Clinic2"]}}        
//        return compact('clinicList');
        return view('Reservation.create', compact('clinicList'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReservationRequest $request)
    {
        //
        //get data from view
        $patient_id            = auth()->user()->id;//$request->input('patient-name');
        $clinic_id             = $request->input('clinic-name');
        $physician_id          = $request->input('physician-name');
        $reservation_day       = $request->input('clinic-day');
        $reservation_time      = $request->input('clinic-time');
        //create command
        $command = new StoreReservationCommand($patient_id, $physician_id, $clinic_id, $reservation_day, $reservation_time);
        //run command
        $this->dispatch($command);
        if(Auth::user()->role_id == 3){
            return redirect('/assistant')
                ->with('message','New Reservation is added');
        }elseif (Auth::user()->role_id == 2 || Auth::user()->role_id == 5) {
            return redirect('/')->with('message','New Reservation is added');
        }
        
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
        $reservation = Reservation::find($id);
//        return compact('reservation','patient_name','physician_name', 'clinic_name');
        return view('Reservation.show',  compact('reservation'));//,'patient_name','physician_name', 'clinic_name'));
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
        $reservation = Reservation::find($id);
        $clinicNames = array();
        $clinicIds = array();
        $clinics = Clinics::all('id','name');
        foreach ($clinics as $clinic ){ 
            // Code Here
            array_push($clinicNames, $clinic->name);
            array_push($clinicIds, $clinic->id);
        }
        $clinicList = array_combine($clinicIds, $clinicNames);
        return view('Reservation.edit',  compact('reservation', 'clinicList'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReservationRequest $request, $id)
    {
        //
        //get data from view
        $patient_id            = Reservation::find($id)->patient_id;
        $clinic_id             = $request->input('clinic-name');
        $physician_id          = $request->input('physician-name');
        $reservation_day       = $request->input('clinic-day');
        $reservation_time      = $request->input('clinic-time');
        $reservation_confirmed = $request->input('reservation-confirmed');
        $reservation_number    = $request->input('reservation-number');
        //create command
        $command = new UpdateReservationCommand($patient_id, $physician_id, $clinic_id, $reservation_day, $reservation_time, $reservation_confirmed, $reservation_number, $id);
        //run command
        $this->dispatch($command);
        return redirect('/reservations')
//        return redirect('/patient/index')
                ->with('message','Reservation Number '.$reservation_number.' is updated');
        
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
        $command = new DestoryReservationCommand($id);
        //run command
        $this->dispatch($command);
        return redirect('/reservations')
//        return redirect('/patient/index')
                ->with('message','Reservation is deleted');
        
    }

    public function getphysicians(Request $request)
    {
        $clinic_id = $request->input('clinic-id');
        $physicianNames = array();
        $physicianIds = array();
        $physicians = Physician_Details::where('clinic_id',$clinic_id)->select('user_id')->get();//->get();
        foreach ($physicians as $physician ){
//            $data = $physician->user->name." - ".$physician->user->physiciandetail->speciality->name;
            array_push($physicianNames, $physician->user->name);
            array_push($physicianIds, $physician->user_id);           
            
        }
//        $physicians_name = $physicians->user->name;//->select('user_id')->get();//->get();
        $physicianList = array_combine($physicianIds, $physicianNames);
        return $physicianList;//$physicians_name;
        
    }
    public function getdays(Request $request)
    {
        //'clinic-id', 'physician-id'
        $clinic_id = $request->input('clinic_id');
        $physician_id = $request->input('physician_id');
        $days= ClinicTimes::where('clinic_id',$clinic_id)
                ->where('physician_id',$physician_id)
                ->select('day', 'start', 'end')->get();
//        $days = ClinicTimes::where('clinic_id',$clinic_id)
//                               ->where('physician_id',$physician_id);
//                               ->select('day','start','end');//->get();//,'start','end')->get();
        
//        $daysValues = array();
//        foreach ($days as $day ){
//            array_push($daysValues, $days->start);
////            array_push($physicianIds, $physician->user_id);           
//            
//        }
        $x=['ff'];
        return $days;//$days[0];//Values;//$physicians_name;
        
    }

    public function createbyassistant( $id)
    {
         $username=User::find($id)->name;
        $clinicNames = array();
        $clinicIds = array();
        $clinics = Clinics::all('id','name');
        foreach ($clinics as $clinic ){ 
            // Code Here
            array_push($clinicNames, $clinic->name);
            array_push($clinicIds, $clinic->id);
        }
        $clinicList = array_combine($clinicIds, $clinicNames);
        return view('Reservation.createforassistant', compact('username','clinicList'));
    }
    public function add($id)
    {
        //
        $user = User::where('id',$id)->first();
        $clinicNames = array();
        $clinicIds = array();
        $clinics = Clinics::all('id','name');
        foreach ($clinics as $clinic ){ 
            // Code Here
            array_push($clinicNames, $clinic->name);
            array_push($clinicIds, $clinic->id);
        }
        $clinicList = array_combine($clinicIds, $clinicNames);
        return view('Reservation.create', compact('clinicList', 'user'));
    }

}