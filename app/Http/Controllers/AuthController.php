<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function formLogin()
    {
        return view('auth.login');
    }

    public function processLogin(Request $request)
    {
        $request->validate(User::$rules, User::$errorMessages);

        $credentials = $request->only(['email', 'password']);

        if(!Auth::attempt($credentials)){
            return redirect('/iniciar-sesion')
            ->with('status.message', 'Los datos ingresados no coinciden con nuestros registros.')
            ->withInput();
        };

        return redirect('/admin/contenido')
            ->with('status.message','Hola ' . '<b>' . Auth::user()->email . '</b>, sesión iniciada con éxito.');
    }

    public function processLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/iniciar-sesion')
        ->with('status.message', 'La sesión se cerró con éxito.');
    }
}


