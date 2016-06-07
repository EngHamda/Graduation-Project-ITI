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
//use App\user;

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
//        $reservations = Reservation:://where('clinic_id', 1)
//                                    //clinic_id for assistant login
//                //->
//                orderBy('reservation_day', 'asc')
//                ->orderBy('reservation_time', 'asc')
//                ->orderBy('reservation_confirmed', 'asc')
//                ->orderBy('reservation_number', 'asc')
//                ->get();//array of selected columns
////        return compact('reservations');//,'patient_names');
//        return view('assistantprofile', compact('reservations'));//,'patient_names'));
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
        $physician_id          = 20;//$request->input('physician-name');
        $reservation_day       = 'Saturday';//$request->input('clinic-day').$request->input('clinic-time');
        $reservation_time       = '04:00-08:00';
        //create command
        $command = new StoreReservationCommand($patient_id, $physician_id, $clinic_id, $reservation_day, $reservation_time);
        //run command
        $this->dispatch($command);
        return redirect('/patient/index')
                ->with('message','New Reservation is added');
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
        $physician_id          = 20;//$request->input('physician-name');
        $reservation_day       = 'Saturday';//$request->input('clinic-day').$request->input('clinic-time');
        $reservation_time      = '04:00-08:00';
        $reservation_confirmed = $request->input('reservation-confirmed');
        $reservation_number    = $request->input('reservation-number');
        //$current_main_image_filename = Reservation::find($id)->main_image;
//        if($image){
//            $image_filename= $image->getClientOriginalFileName();
//            //write @cache\app.php
//            $image->move(public_path('images'),$image_filename);
//        }else {
//            $image_filename = $current_main_image_filename;            
//        }
        //create command
        $command = new UpdateReservationCommand($patient_id, $physician_id, $clinic_id, $reservation_day, $reservation_time, $reservation_confirmed, $reservation_number, $id);
        //run command
        $this->dispatch($command);
        return redirect('/patient/index')
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
        return redirect('/patient/index')
                ->with('message','Reservation is deleted');
        
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












}
