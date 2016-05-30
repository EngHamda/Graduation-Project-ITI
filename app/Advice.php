<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Advice extends Model
{
    protected $table="advices";
    protected $fillable=['advice','user_id'];
    protected $hidden=[];

    public function user(){
        return $this->belongsTo('App\User');
    }

    public function likes()
    {
      return $this->hasMany('App\Like');
    }
}
