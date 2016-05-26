<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Clinics;
use App\Http\Requests\CreateClinicsRequest;
use App\Http\Requests\UpdateClinicsRequest;
use Illuminate\Http\Request;



class ClinicsController extends Controller {

	/**
	 * Display a listing of clinics
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $clinics = Clinics::all();

		return view('admin.clinics.index', compact('clinics'));
	}

	/**
	 * Show the form for creating a new clinics
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.clinics.create');
	}

	/**
	 * Store a newly created clinics in storage.
	 *
     * @param CreateClinicsRequest|Request $request
	 */
	public function store(CreateClinicsRequest $request)
	{
	    
		Clinics::create($request->all());

		return redirect()->route('admin.clinics.index');
	}

	/**
	 * Show the form for editing the specified clinics.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$clinics = Clinics::find($id);
	    
	    
		return view('admin.clinics.edit', compact('clinics'));
	}

	/**
	 * Update the specified clinics in storage.
     * @param UpdateClinicsRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateClinicsRequest $request)
	{
		$clinics = Clinics::findOrFail($id);

        

		$clinics->update($request->all());

		return redirect()->route('admin.clinics.index');
	}

	/**
	 * Remove the specified clinics from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Clinics::destroy($id);

		return redirect()->route('admin.clinics.index');
	}

    /**
     * Mass delete function from index page
     * @param Request $request
     *
     * @return mixed
     */
    public function massDelete(Request $request)
    {
        if ($request->get('toDelete') != 'mass') {
            $toDelete = json_decode($request->get('toDelete'));
            Clinics::destroy($toDelete);
        } else {
            Clinics::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.clinics.index');
    }

}
