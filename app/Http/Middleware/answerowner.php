<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Answer;
class answerowner
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)


    {  
 $id = $request->id;
$answer =Answer::findOrFail($id);

if(!Auth::user())
{

return redirect('/');
}

if (Auth::user())

        { 
         if($answer->physician_id!=Auth::user()->id)
           {
             return redirect('/');
          
            } 
        }


 return $next($request);
}




}
