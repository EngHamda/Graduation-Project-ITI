<?php

namespace App\Http\Controllers;
//Command
use App\Commands\StoreAdviceCommand;

use App\Commands\UpdateAdviceCommand;

use App\Commands\DestroyAdviceCommand;


use Illuminate\Http\Request;
//Request
use App\Http\Requests;

use App\Http\Requests\StoreAdviceRequest;

use App\Http\Requests\UpdateAdviceRequest;
//Model
use App\Advice;

class AdvicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()

    {

        $advices = Advice::all();

        return view('advice.index',compact('advices'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('advice.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreAdviceRequest $request)
    {
        $advice=$request->input('advice');
        $physician_id=$request->input('user_id');

        $command= new StoreAdviceCommand($advice,$physician_id);
        $this->dispatch($command);
        return \Redirect::route('advices.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {   $advice = Advice::find($id);
        return view('advice.show',compact('advice'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)

    {
        $advice = Advice::find($id);
        return view('advice.edit',compact('advice'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAdviceRequest $request, $id)
    {
        $advice=$request->input('advice');


        $command= new UpdateAdviceCommand($id,$advice);
        $this->dispatch($command);
        return \Redirect::route('advices.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $command=new DestroyAdviceCommand($id);
        $this->dispatch($command);
        return \Redirect::route('advices.index');
    }

    public function adviceLikeAdvice(){
        
    }
}
