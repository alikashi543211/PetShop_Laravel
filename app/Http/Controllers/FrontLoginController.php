<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class FrontLoginController extends Controller
{
    public function login_register()
    {
    	return view('shopvert.login_register');
    }
}
