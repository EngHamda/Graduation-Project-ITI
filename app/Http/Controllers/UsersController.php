<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Role;
use App\User;
use App\Clinics;
use App\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;



class UsersController extends Controller
{
    /**
     * Show a list of users
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $users = User::all();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show a page of user creation
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $roles = Role::lists('title', 'id');
        $clinics = Clinics::lists('name','id');
        $specialities = Speciality::pluck('name','id');

        return view('admin.users.create', compact('roles','clinics','specialities'));
    }

    /**
     * Insert new user into the system
     *
     * @param Request $request
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(StoreUserRequest $request)
    {

        $request = $this->saveFiles($request);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user = User::create($input);

        return redirect()->route('users.index')->withMessage(trans('quickadmin::admin.users-controller-successfully_created'));
    }

    /**
     * Show a user edit page
     *
     * @param $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $user  = User::findOrFail($id);
        $roles = Role::lists('title', 'id');

        return view('admin.users.edit', compact('user', 'roles'));
    }

    /**
     * Update our user information
     *
     * @param Request $request
     * @param         $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $input = $request->all();
        $input['password'] = Hash::make($input['password']);
        $user->update($input);

        return redirect()->route('users.index')->withMessage(trans('quickadmin::admin.users-controller-successfully_updated'));
    }

    /**
     * Destroy specific user
     *
     * @param $id
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $user = User::findOrFail($id);
        User::destroy($id);

        return redirect()->route('users.index')->withMessage(trans('quickadmin::admin.users-controller-successfully_deleted'));
    }




     public function usersLogin(Request $request)
{


	$validator = Validator::make($request->all(), [
		    'email' => 'required|max:255',
		    'password' => 'required',
		]);


//print_r($request->all());

        if ($validator->fails()) {
            return redirect('/user/login')
            ->withErrors($validator)
                    ->withInput();
            }

$credientials=['email'=> $request->get('email'),'password'=>$request->get('password'),'role_id'=>2];
if(auth()->attempt($credientials)){return redirect('/ggggg');}

$credientials=['email'=> $request->get('email'),'password'=>$request->get('password'),'role_id'=>3];
if(auth()->attempt($credientials)){return redirect('/assistant');}

$credientials=['email'=> $request->get('email'),'password'=>$request->get('password'),'role_id'=>4];

if(auth()->attempt($credientials)){return redirect('/physician');}

$credientials=['email'=> $request->get('email'),'password'=>$request->get('password'),'role_id'=>5];

if(auth()->attempt($credientials)){return redirect('/physician');}


else{
    return redirect('/user/login')
       ->withErrors(['error'=>'login invalid'])
       ->withInput() ;  
    
    }
    }
}

