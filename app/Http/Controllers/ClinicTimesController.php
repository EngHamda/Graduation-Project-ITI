<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Commands\StoreClinicTimesCommand;
use App\Http\Requests\StoreClinicTimesRequest;

use App\Commands\UpdateClinicTimesCommand;
use App\Http\Requests\UpdateClinicTimesRequest;

use App\Commands\DestoryClinicTimesCommand;


use App\ClinicTimes;
use App\Physician_Details;
use Auth;


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
        //get all physician in this clinic
        $clinic_id = auth()->user()->assistant_details->clinic_id;
        $physicianNames = array();
        $physicianIds = array();
        $physicians = Physician_Details::where('clinic_id',$clinic_id)->select('user_id')->get();
        foreach ($physicians as $physician ){
            array_push($physicianNames, $physician->user->name);
            array_push($physicianIds, $physician->user_id);           
        }
        $physicianList = array_combine($physicianIds, $physicianNames);
//        return compact('physicianList');
        return view('ClinicTimes.create', compact('physicianList'));
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
        $clinic_id    = auth()->user()->assistant_details->clinic_id;
        $physician_id = $request->input('physician-name');
        $day          = $request->input('clinic-day');
        $start        = $request->input('time_from');
        $end          = $request->input('time_to');
        //create command
        $command = new StoreClinicTimesCommand($clinic_id, $physician_id, $day, $start, $end);
        //run command
        $this->dispatch($command);
        return \Redirect::route('clinictimes.create')
                ->with('message','New Time is added');
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
        $clinic_id    = auth()->user()->assistant_details->clinic_id;
        $physician_id = $request->input('physician-name');
        $day          = $request->input('clinic-day');
        $start        = $request->input('time_from');
        $end          = $request->input('time_to');
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
    
//    public function getdays(Request $request)
//    {
//        //'clinic-id', 'physician-id'
//        $clinic_id = auth()->user()->assistant_details->clinic_id;
//        $physician_id = $request->input('physician_clinic_times_id');
//        $days= ClinicTimes::where('clinic_id',$clinic_id)
//                ->where('physician_id',$physician_id)
//                ->select('day')->get();
//        return $days;//$days[0];//Values;//$physicians_name;
//        
//    }
}
