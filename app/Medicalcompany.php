<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;

class Medicalcompany extends Model implements AuthenticatableContract, CanResetPasswordContract
{
   use Authenticatable, CanResetPassword;
   protected $table = 'medicalcompanies';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password','phone','buildingnumber','street','city','country','picture'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
       
    ];



public function advertisements()
    {
        return $this->hasMany('App\Advertisement');
    }





}
