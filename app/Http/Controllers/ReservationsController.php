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
use DB;
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
        $patient_names = DB::table('reservations')
            ->join('users', 'reservations.patient_id', '=', 'users.id')
            ->select('reservations.patient_id','users.name as patient_name')
            ->get();
        $reservations = DB::table('reservations')
            ->join('users', 'reservations.physician_id', '=', 'users.id')
            ->join('clinics', 'reservations.clinic_id', '=', 'clinics.id')
            ->select('reservations.*','users.name as physician_name', 
                    'clinics.name as clinic_name')
            ->orderBy('reservations.reservation_day', 'asc')
            ->orderBy('reservations.reservation_confirmed', 'asc')
            ->orderBy('reservations.reservation_number', 'asc')
            ->get();
//        return compact('reservation','patient_names');
        return view('Reservation.index',  compact('reservations','patient_names'));
//        return view('index',  compact('reservations','patient_names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('Reservation.create');
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
        $patient_id            = 1;//$request->input('patient-name');
        $clinic_id             = 1;//$request->input('clinic-name');
        $physician_id          = 2;//$request->input('physician-name');
        $reservation_day       = $request->input('clinic-day').$request->input('clinic-time');
        $reservation_confirmed = $request->input('reservation-confirmed');
        $reservation_number    = $request->input('reservation-number');
/*        
//$image      = $request->image('reservation-image');
        //check data
//        if($image){
//            $image_filename= $image->getClientOriginalFileName();
//            //write @cache\app.php
//            $image->move(public_path('images'),$image_filename);
//        }else {
//            $image_filename = 'noimage.jpg';            
//        }
 * 
 */
        //create command
        $command = new StoreReservationCommand($patient_id, $physician_id, $clinic_id, $reservation_day, $reservation_confirmed, $reservation_number);
        //run command
        $this->dispatch($command);
        return \Redirect::route('reservations.index')
                ->with('message','New Reservation is added');
        /*
        {!! Form::text('email', 'User_Name',array('class'=>' form-control', 'readonly')) !!}
        {!! Form::select('clinic-name', array('L' => 'Large', 'S' => 'Small')
        {!! Form::select('physician-name', array('L' => 'Large', 'S' => 'Small')
        {!! Form::select('clinic-day', array('saturday' => 'Saturday', 
        {!! Form::select('clinic-time', array('01.00am' => '01.00 pm - 03.00 pm', 
        {!! Form::radio('reservation-confirmed', '0', false) !!}
        {!! Form::radio('reservation-confirmed', '1', true) !!}
        {!! Form::number('reservation-number', null, 
        {!! Form::submit('Create Reservation', array('class'=>'btn btn-success col-sm-offset-2')) !!}                               
         */
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
        $patient_name = DB::table('users')
            ->where('id', '=', $reservation->patient_id)
            ->select('name as patient_name')
            ->get();
        $physician_name = DB::table('users')
            ->where('id', '=', $reservation->physician_id)
            ->select('name as physician_name')
            ->get();
        $clinic_name = DB::table('clinics')
            ->where('id', '=', $reservation->clinic_id)
            ->select('name as clinic_name')
            ->get();
//        return compact('reservation','patient_name','physician_name', 'clinic_name');
        return view('Reservation.show',  compact('reservation','patient_name','physician_name', 'clinic_name'));
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
        return view('Reservation.edit',  compact('reservation'));
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
        $patient_id            = 1;//$request->input('patient-name');
        $clinic_id             = 1;//$request->input('clinic-name');
        $physician_id          = 2;//$request->input('physician-name');
        $reservation_day       = $request->input('clinic-day').$request->input('clinic-time');
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
        $command = new UpdateReservationCommand($patient_id, $physician_id, $clinic_id, $reservation_day, $reservation_confirmed, $reservation_number, $id);
        //run command
        $this->dispatch($command);
        return \Redirect::route('reservations.index')
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
        return \Redirect::route('reservations.index')
                ->with('message','Reservation is deleted');
        
    }
}
