<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\User;

class StorePatientBasicInfoCommand extends Command implements SelfHandling{




public $name;
public $email;
public $password;



public function __construct($name,$email,$password,$dateofbirth,$gender,$phone,$buildingnumber,$street,$city,$profilepicture,$roleid,$country)
{
$this->name=$name;
$this->email=$email;
$this->password=$password;
$this->dateofbirth=$dateofbirth;
$this->gender=$gender;
$this->phone=$phone;
$this->buildingnumber=$buildingnumber;
$this->street=$street;
$this->city=$city;
$this->profilepicture=$profilepicture;
$this->roleid=$roleid;
$this->country=$country;

}

public function handle()
{




return User::create([

'name'=>$this->name,
'email'=>$this->email,
'password'=>$this->password,
'role_id'=>$this->roleid,
'birth_date'=>$this->dateofbirth,
'gender'=>$this->gender,
'phone'=>$this->phone,
'buildingnumber'=>$this->buildingnumber,
'street'=>$this->street,
'city'=>$this->city,
'country'=>$this->country,
'profile_picture'=>$this->profilepicture,



]);













}






}
