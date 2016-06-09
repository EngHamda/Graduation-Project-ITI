<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Redirect;
use Schema;
use App\Advertisement;
use App\Http\Requests\CreateAdvertisementRequest;
use App\Http\Requests\UpdateAdvertisementRequest;
use Illuminate\Http\Request;



class AdvertisementController extends Controller
{

	/**
	 * Display a listing of advertisement
	 *
	 * @param Request $request
	 *
	 * @return \Illuminate\View\View
	 */
	public function index(Request $request)
	{
		$advertisement = Advertisement::all();

		return view('admin.advertisement.index', compact('advertisement'));
	}

	/**
	 * Show the form for creating a new advertisement
	 *
	 * @return \Illuminate\View\View
	 */
	public function create()
	{


		return view('admin.advertisement.create');
	}

	/**
	 * Store a newly created advertisement in storage.
	 *
	 * @param CreateAdvertisementRequest|Request $request
	 */
	public function store(CreateAdvertisementRequest $request)
	{

		Advertisement::create($request->all());

		return redirect()->route('admin.advertisement.index');
	}

	/**
	 * Show the form for editing the specified advertisement.
	 *
	 * @param  int $id
	 * @return \Illuminate\View\View
	 */
	public function edit($id)
	{
		$advertisement = Advertisement::find($id);


		return view('admin.advertisement.edit', compact('advertisement'));
	}

	/**
	 * Update the specified advertisement in storage.
	 * @param UpdateAdvertisementRequest|Request $request
	 *
	 * @param  int $id
	 */
	public function update($id, UpdateAdvertisementRequest $request)
	{
		$advertisement = Advertisement::findOrFail($id);


		$advertisement->update($request->all());

		return redirect()->route('admin.advertisement.index');
	}

	/**
	 * Remove the specified advertisement from storage.
	 *
	 * @param  int $id
	 */
	public function destroy($id)
	{
		Advertisement::destroy($id);

		return redirect()->route('admin.advertisement.index');
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
			Advertisement::destroy($toDelete);
		} else {
			Advertisement::whereNotNull('id')->delete();
		}

		return redirect()->route('admin.advertisement.index');
	}



}