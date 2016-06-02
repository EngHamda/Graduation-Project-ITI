<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Validator;
use App\Role;
use App\User;
use App\Clinics;
use App\Speciality;
use App\Physician_Details;
use App\Assistant_Details;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Http\Requests\StoreUserRequest;
use App\Commands\StoreGeneralUserCommand;
use App\Commands\StoreAssistantCommand;
use App\Commands\StorePhysicianCommand;


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
//        $user = User::create($input);
        $name=$input['name'];
        $email=$input['email'];
        $password=$input['password'];
        $gender=$input['gender'];
        $birth_date=$input['birth_date'];
        $phone=$input['phone'];
        $building_number=$input['buildingnumber'];
        $street=$input['street'];
        $city=$input['city'];
        $country=$input['country'];
        $profile_picture=$input['profile_picture'];
        $role_id=$input['role_id'];
        $clinic_id=$input['clinic_id'];
        $speciality_id=$input['speciality_id'];
        $title=$input['title'];
        $certification=$input['certification'];


        $command= new StoreGeneralUserCommand($name,$email,$password,$gender,$birth_date,$phone,$building_number,$street,$city,$country,$profile_picture,$role_id);
        $this->dispatch($command);

        $user = User::where('email',$email)->first();

        $user_id = $user->id;

        if ($role_id==4) {
            $command1 = new StorePhysicianCommand( $title, $certification, $user_id,$clinic_id, $speciality_id);
            $this->dispatch($command1);
        }
        elseif($role_id==3) {
            $command2 = new StoreAssistantCommand($clinic_id, $user_id);
            $this->dispatch($command2);
        }




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



$credientials=['email'=> $request->get('email'),'password'=>$request->get('password'),'role_id'=>5];

if(auth()->attempt($credientials))
{
return redirect('/');
}



else{
    return redirect('/user/login')
       ->withErrors(['error'=>'login invalid'])
       ->withInput() ;  
    
    }
    }
}

