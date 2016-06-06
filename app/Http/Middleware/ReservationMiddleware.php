<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
class REservationMiddleware
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

if(!Auth::user())
{

return redirect('/');
}

if (Auth::user())
        {  if(Auth::user()->role_id!=3  && Auth::user()->role_id!=2  && Auth::user()->role_id!=5  )
           {

             return redirect('/');
           } 
        }


 return $next($request);
}



}
