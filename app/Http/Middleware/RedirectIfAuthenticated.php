<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

       if(Auth::user())
{

if(Auth::user()->role_id==4)
{
return redirect('/physician');

}


if(Auth::user()->role_id==3)
{
return redirect('/assistant');

}


if(Auth::user()->role_id==1)
{
return redirect('/admin');

}


}



        if (Auth::guard($guard)->check()) {
            return redirect('/');
        }
          





        return $next($request);
    }
}
