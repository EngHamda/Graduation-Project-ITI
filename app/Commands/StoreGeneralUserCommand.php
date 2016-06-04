<?php

namespace  App\Commands;


use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\User;


class StoreGeneralUserCommand extends command implements  SelfHandling{
    public $name;
    public $email;
    public $password;
    public $gender;
    public $birth_date;
    public $phone;
    public $building_number;
    public $street;
    public $city;
    public $country;
    public $profile_picture;
    public $role_id;

    public function __construct($name,$email,$password,$gender,$birth_date,$phone,$building_number,$street,$city,$country,$profile_picture,$role_id)
    {
        $this->name=$name;
        $this->email=$email;
        $this->password=$password;
        $this->gender=$gender;
        $this->birth_date=$birth_date;
        $this->phone=$phone;
        $this->building_number=$building_number;
        $this->street=$street;
        $this->city=$city;
        $this->country=$country;
        $this->profile_picture=$profile_picture;
        $this->role_id=$role_id;

    }

    public function handle(){
        return User::create([
                'name'=>$this->name,
                'email'=>$this->email,
                'password'=>$this->password,
                'gender'=>$this->gender,
                'birth_date'=>$this->birth_date,
                'phone'=>$this->phone,
                'buildingnumber'=>$this->building_number,
                'street'=>$this->street,
                'city'=>$this->city,
                'country'=>$this->country,
                'role_id'=>$this->role_id,
                'profile_picture'=>$this->profile_picture,
            ]
        );
    }
}
