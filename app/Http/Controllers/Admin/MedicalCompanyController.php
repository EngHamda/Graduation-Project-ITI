<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\MedicalCompany;
use App\Http\Requests\CreateMedicalCompanyRequest;
use App\Http\Requests\UpdateMedicalCompanyRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Traits\FileUploadTrait;


class MedicalCompanyController extends Controller {

	/**
	 * Display a listing of medicalcompany
	 *
     * @param Request $request
     *
     * @return \Illuminate\View\View
	 */
	public function index(Request $request)
    {
        $medicalcompany = MedicalCompany::all();

		return view('admin.medicalcompany.index', compact('medicalcompany'));
	}

	/**
	 * Show the form for creating a new medicalcompany
	 *
     * @return \Illuminate\View\View
	 */
	public function create()
	{
	    
	    
	    return view('admin.medicalcompany.create');
	}

	/**
	 * Store a newly created medicalcompany in storage.
	 *
     * @param CreateMedicalCompanyRequest|Request $request
	 */
	public function store(CreateMedicalCompanyRequest $request)
	{
	    $request = $this->saveFiles($request);
		MedicalCompany::create($request->all());

		return redirect()->route('admin.medicalcompany.index');
	}

	/**
	 * Show the form for editing the specified medicalcompany.
	 *
	 * @param  int  $id
     * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$medicalcompany = MedicalCompany::find($id);
	    
	    
		return view('admin.medicalcompany.edit', compact('medicalcompany'));
	}

	/**
	 * Update the specified medicalcompany in storage.
     * @param UpdateMedicalCompanyRequest|Request $request
     *
	 * @param  int  $id
	 */
	public function update($id, UpdateMedicalCompanyRequest $request)
	{
		$medicalcompany = MedicalCompany::findOrFail($id);

        $request = $this->saveFiles($request);

		$medicalcompany->update($request->all());

		return redirect()->route('admin.medicalcompany.index');
	}

	/**
	 * Remove the specified medicalcompany from storage.
	 *
	 * @param  int  $id
	 */
	public function destroy($id)
	{
		MedicalCompany::destroy($id);

		return redirect()->route('admin.medicalcompany.index');
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
            MedicalCompany::destroy($toDelete);
        } else {
            MedicalCompany::whereNotNull('id')->delete();
        }

        return redirect()->route('admin.medicalcompany.index');
    }

}
