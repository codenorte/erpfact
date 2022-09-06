<?php

namespace App\Http\Middleware;

use Closure;
use Auth;

class Active
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
        //dd(Auth::user()->is_active);
        if(Auth::check() && Auth::user()->is_active){
            return $next($request);
        }

        return redirect('/dashboard');
        
    }
}
