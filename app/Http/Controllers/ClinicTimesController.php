<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Commands\StoreClinicTimesCommand;
use App\Http\Requests\StoreClinicTimesRequest;

use App\Commands\UpdateClinicTimesCommand;
use App\Http\Requests\UpdateClinicTimesRequest;

use App\Commands\DestoryClinicTimesCommand;
use App\Clinics;
use App\User;




use App\ClinicTimes;


class ClinicTimesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $clinictimes = ClinicTimes::all();
        return compact('clinictimes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
//        $x=10;
//        return compact('x');

$clinicsname=Clinics::all();
$physiciannames=User::where('role_id','=',4)->get();
  return view('addclinictimes', compact('clinicsname', 'physiciannames'));







    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreClinicTimesRequest $request)
    {
        //
        //get data from view
        //"clinic_id":"1","physician_id":"3","day":"4","start":"12:00","end":"15:00"
        $clinic_id    = 1;//$request->input('patient-name');
        $physician_id = 3;// $request->input('clinic-name');
        $day          = '4';
        $start        = '12:00';
        $end          = '15:00';
        //create command
        $command = new StoreClinicTimesRequest($clinic_id, $physician_id, $day, $start, $end);
        //run command
        $this->dispatch($command);
        return \Redirect::route('clinictimes.index')
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
        $clinictime = ClinicTimes::find($id);
        return compact('clinictime');
//        return view('ClinicTimes.show',  compact('clinictime'));
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
        $clinictime = ClinicTimes::find($id);
        return compact('clinictime');
//        return view('ClinicTimes.edit',  compact('clinictime'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateClinicTimesRequest $request, $id)
    {
        //
        $clinic_id    = 1;//$request->input('patient-name');
        $physician_id = 3;// $request->input('clinic-name');
        $day          = '4';
        $start        = '12:00';
        $end          = '15:00';
        //create command
        $command = new UpdateClinicTimesCommand($clinic_id, $physician_id, $day, $start, $end, $id);
        //run command
        $this->dispatch($command);
        return \Redirect::route('ClinicTimes.index')
                ->with('message','ClinicTimes is updated');       

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
        $command = new DestoryClinicTimesCommand($id);
        //run command
        $this->dispatch($command);
        return \Redirect::route('ClinicTimes.index')
                ->with('message','ClinicTimes is deleted');
        
    }
}
