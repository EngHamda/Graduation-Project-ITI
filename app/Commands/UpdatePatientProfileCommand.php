<?php

namespace App\Commands;
use App\Commands\Command;
use Illuminate\Contracts\Bus\SelfHandling;
use App\User;

class UpdatePatientProfileCommand extends Command implements SelfHandling{

public $name;
public $birth_date;
public $gender;
public $phone;
public $buildingnumber;
public $street;
public $city;
public $country;
public $current_image_filename;
public $id;
public function __construct($name,$birth_date,$gender, $phone,$buildingnumber, $street,$city,$country,$current_image_filename,$id)
{
$this->id=$id;
$this->name=$name;
$this->birth_date=$birth_date;
$this->gender=$gender;
$this->phone=$phone;
$this->buildingnumber=$buildingnumber;
$this->street=$street;
$this->city=$city;
$this->country=$country;
$this->current_image_filename=$current_image_filename;
}

public function handle()
{

return User::where('id',$this->id)->update(array(

'name'=>$this->name,
'birth_date'=>$this->birth_date,
'gender'=>$this->gender,
'phone'=>$this->phone,
'buildingnumber'=>$this->buildingnumber,
'street'=>$this->street,
'city'=>$this->city,
'country'=>$this->country,
'profile_picture'=>$this->current_image_filename,









));













}






}
