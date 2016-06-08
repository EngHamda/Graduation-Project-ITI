<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class AdvertisementController extends Controller
{
    
  public function uploaded(Request $request)
    {
        $name = $request->input('name');

        $path = $request->file('path')->getClientOriginalName();

        $medicalcompany_id = $request->input('medicalcompany_id');

        $request->file('path')->move(public_path('images'), $request->file('path')->getClientOriginalName());


        $command = new StoreAdCommand($name, $path, $medicalcompany_id);

        $this->dispatch($command);

        $requests = Advertisementsrequest::where('medicalcompany_id', '=', 1)->get();

        return view('medicalcompany.index', compact('requests', 'id'));




    }








 public function confirm($id)
    {


        $command = new ConfirmRequestCommand($id);

        $this->dispatch($command);

        return redirect('medicalcompany')->with('status', 'request confirm');


    }











}
