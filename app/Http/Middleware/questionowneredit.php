<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Question;
class questionowneredit
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
        $question =Question::findOrFail($id);
        if(!Auth::user())
            {return redirect('/');}
        if (Auth::user())
            {
             if( Auth::user()->role_id != 2 && $question->user_id != auth()->user()->id && Auth::user()->role_id != 5 )
                {
                  return redirect('/');
                } 
            }
        return $next($request);
    }
}