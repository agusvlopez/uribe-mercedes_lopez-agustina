<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UsuarioController extends Controller
{
    public function viewUser($id)
    {
        $usuario = User::find($id);

        $compras = $usuario->compras; // Obtener las compras del usuario

        if ($usuario) {
            $nombre = $usuario->name;
            $email = $usuario->email;
            $rol = $usuario->role;

            return view('user.view', [
                'usuario' => $usuario,
                'compras' => $compras,
            ]);
        } else {
            return redirect()->route('home')
                ->with('danger.message', 'El usuario no fue encontrado.');
        }
    }

    public function formEditUser(int $id)
    {
        return view('user.edit', [
            'usuario' =>  User::findOrFail($id),
    ]);
    }

    public function processEditUser(Request $request, $id)
    {
        $request->validate(User::$updateRules, User::$errorMessages);

        try {
            $usuario = User::findOrFail($id);

            $usuario->update([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => $request->filled('password') ? bcrypt($request->input('password')) : $usuario->password,
            ]);

            return redirect()
                ->route('user.view', ['id' => $usuario->id])
                ->with('status.message', 'Los datos del usuario fueron actualizados con éxito.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('danger.message', 'Hubo un error al actualizar los datos del usuario.')
                ->withInput();
        }
    }


}
