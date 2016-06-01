<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Speciality;
use App\Http\Requests\CreateSpecialityRequest;
use App\Http\Requests\UpdateSpecialityRequest;
use Illuminate\Http\Request;



class SpecialityController extends Controller {

	/**
	 * Display a listing of speciality
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $speciality = Speciality::all();

		return view('admin.speciality.index', compact('speciality'));
	}

	/**
	 * Show the form for creating a new speciality
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.speciality.create');
	}

	/**
	 * Store a newly created speciality in storage.
	 *
     * @param CreateSpecialityRequest|Request $request
	 */
	public function store(CreateSpecialityRequest $request)
	{
	    
		Speciality::create($request->all());

		return redirect()->route('admin.speciality.index');
	}

	/**
	 * Show the form for editing the specified speciality.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$speciality = Speciality::find($id);
	    
	    
		return view('admin.speciality.edit', compact('speciality'));
	}

	/**
	 * Update the specified speciality in storage.
     * @param UpdateSpecialityRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateSpecialityRequest $request)
	{
		$speciality = Speciality::findOrFail($id);

        

		$speciality->update($request->all());

		return redirect()->route('admin.speciality.index');
	}

	/**
	 * Remove the specified speciality from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		Speciality::destroy($id);

		return redirect()->route('admin.speciality.index');
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
            Speciality::destroy($toDelete);
        } else {
            Speciality::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.speciality.index');
    }

}
