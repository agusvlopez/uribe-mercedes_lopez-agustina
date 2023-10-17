<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {

    }
}
