<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsGuest
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if(session()->get('user')){
            return redirect()->route('home');
        }
        return $next($request);
    }
}
