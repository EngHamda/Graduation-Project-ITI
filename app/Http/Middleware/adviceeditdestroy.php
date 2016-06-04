<?php
namespace App\Http\Middleware;
use App\Advice;
use Closure;
use Auth;

class adviceeditdestroy
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
$advice =Advice::findOrFail($id);
if(!Auth::user())
{

return redirect('/');
}

if (Auth::user())
        {  if( $advice->user_id!=Auth::user()->id)
           {
             return redirect('/');
           } 
        }


 return $next($request);
}




}
