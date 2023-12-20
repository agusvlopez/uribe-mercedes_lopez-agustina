<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Database\QueryException;
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

        // Verificar el rol del usuario después de la autenticación
        // $user = Auth::user();

        if (Auth::attempt($credentials))
        {
            // El usuario está autenticado, ahora puedes acceder a sus propiedades
            $user = Auth::user();

            if ($user->role == 'admin')
            {
                return redirect()->route('admin.index')->with('status.message', 'Hola ' . '<b>' . $user->name . '</b>, sesión iniciada con éxito.');
            } elseif ($user->role == 'cliente')
            {
                return redirect()->route('home')->with('status.message', 'Hola ' . '<b>' . $user->name . '</b>, sesión iniciada con éxito.');
            }
        }

        if(!Auth::attempt($credentials))
        {
            return redirect()
            ->route('auth.login.form')
            ->with('danger.message', 'Los datos ingresados no coinciden con nuestros registros.')
            ->withInput();
        };
    }

    public function processLogout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()
        ->route('auth.login.form')
        ->with('status.message', 'La sesión se cerró con éxito.');
    }

    public function formRegister()
    {
        return view('auth.register');
    }

    public function processRegister(Request $request)
    {
        try
        {
            $request->validate(User::$rules, User::$errorMessages);

            // Crear un nuevo usuario
            $user = User::create([
                'name' => '',
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'role' => 'cliente'
            ]);

            // Autenticar al usuario después del registro
            Auth::login($user);

        } catch (QueryException $e)
        {
            if ($e->getCode() === '23000')
            {
                return redirect()->route('auth.register.form')->with('danger.message', 'No se pudo crear el usuario porque el correo electrónico ya está registrado. Por favor, intentá nuevamente.');
            }
        }
        return redirect()
            ->route('home')
            ->with('status.message', '¡Registro exitoso! ¡Bienvenido, ' . $user->email . '!');

    }
}
