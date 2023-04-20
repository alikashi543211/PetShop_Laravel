<?php

namespace App\Http\Middleware;

use Closure;
use Session;
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
        // if (Auth::guard($guard)->check()) {
        //     //dd(Auth::user()->hasAnyRole(['admin','subAdmin']));
        //     if(Auth::user()->hasAnyRole(['admin','subAdmin']))
        //     {
        //         return redirect()->route('admin.dashboard');
        //     }
        //     if(Auth::user()->hasRole('user'))
        //     {
        //         return redirect()->route('home');
        //     }
        //     // return redirect('/home'); // in build coding he.
        //     // dd("Success 2");
        // }
        if(Auth::check()):
            
            return redirect()->route("shopvert.index");
        endif;
// dd('Failed');
        return $next($request);
    }
}
