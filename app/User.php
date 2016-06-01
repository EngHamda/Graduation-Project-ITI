<?php

namespace App;

use Illuminate\Auth\Authenticatable;
use Illuminate\Auth\Passwords\CanResetPassword;
use Illuminate\Contracts\Auth\Access\Authorizable as AuthorizableContract;
use Illuminate\Contracts\Auth\Authenticatable as AuthenticatableContract;
use Illuminate\Contracts\Auth\CanResetPassword as CanResetPasswordContract;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Access\Authorizable;
use App\Role;
use Laraveldaily\Quickadmin\Observers\UserActionsObserver;
use Laraveldaily\Quickadmin\Traits\AdminPermissionsTrait;
use App\Advertisementsrequest;


class User extends Model implements AuthenticatableContract,
    AuthorizableContract,
    CanResetPasswordContract
{

    use Authenticatable, Authorizable, CanResetPassword, AdminPermissionsTrait;

    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */


  
    protected $fillable = ['name', 'email', 'password','gender','birth_date','phone','buildingnumber','street','city','country','profile_picture','role_id'];


  


    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */


    protected $hidden = [
        'password', 'remember_token',
    ];
    public static function boot()

    {
        parent::boot();

        User::observe(new UserActionsObserver);
    }

    public function role()
    {
        return $this->belongsTo(Role::class);
    }

    public function advice()
    {
        return $this->hasMany('App\advice');
    }

    public function likes()
    {
       return $this->hasMany('App\Like');
    }

    public function physiciandetail()
    {
       return $this->hasOne('App\Physiciandetail');
    }

    public function patientprofile()
    {
       return $this->hasOne('App\Patientprofile');
    }

    public function reservations() {
        
        return $this->hasMany('\App\Reservation');
    }
    public function questions() {
        
        return $this->hasMany('\App\Question');
    }



 public function adverisementrequest() {
        
        return $this->hasMany('\App\Advertisementsrequest');
    }








}
