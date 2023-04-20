<?php

namespace App\Http\Middleware;

use Closure;
use DB;
use Auth;

class ProtectAdmin
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
         $chk=DB::table("role_user")->where("user_id",Auth::user()->id)->where('role_id',1)->count();
         if($chk==0):
            return redirect()->back();
        endif;
        return $next($request);
    }
}
