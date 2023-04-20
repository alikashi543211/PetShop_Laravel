<?php

namespace App\Http\Middleware;
use Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Session;
class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string
     */
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            // Session::flash("flash_message_error","Please login to your account first..");
            return route('user.login_register');
        }
        
    }
}
