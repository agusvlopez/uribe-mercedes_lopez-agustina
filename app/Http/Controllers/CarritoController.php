<?php

namespace App\Http\Controllers;

use App\Models\Recetario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarritoController extends Controller
{
        public function index()
    {
        // Lógica para obtener datos del carrito si es necesario
        // ...

        // Renderizar la vista del carrito
        return view('carrito.index');
    }

    public function showForm()
    {
        $usuario = Auth::user();

        // Obtén los recetarios del usuario
        $recetarios = $usuario->recetarios;

        $items = [];
        $totalPrice = 0;

        foreach($recetarios as $recetario)
        {
            $items[] =
            [
                'img' => $recetario->cover,
                'title' => $recetario->title,
                'unit_price' => $recetario->price,
                'quantity' => 1,
                'currency_id' => 'ARS'
            ];
            $totalPrice += $recetario->price * 1;
        }

        return view('carrito.index', [
            'recetarios' => $recetarios,
            'totalPrice' => $totalPrice,
        ]);
    }

    public function agregarAlCarrito($recetarioId)
    {
        // Obtener el usuario autenticado
        $usuario = Auth::user();

        // Verificar si el usuario está autenticado
        if (!$usuario) {
            // Redirigir o mostrar un mensaje indicando que el usuario debe iniciar sesión
            return redirect()->route('auth.login.form')->with('danger.message', 'Debes iniciar sesión para agregar recetarios al carrito.');
        }

        // Obtener el recetario por ID
        $recetario = Recetario::find($recetarioId);

        // Verificar si el recetario existe
        if (!$recetario) {
            // Redirigir o mostrar un mensaje indicando que el recetario no existe
            return redirect()->route('carrito.index')->with('danger.message', 'El recetario no existe.');
        }

        // Asociar el recetario al usuario en la tabla pivot
        $usuario->recetarios()->attach($recetario);

        // Redirigir o mostrar un mensaje de éxito
        return redirect()->route('carrito.index')->with('status.message', 'Recetario agregado al carrito exitosamente.');
    }
}
