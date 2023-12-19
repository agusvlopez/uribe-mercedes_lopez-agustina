<?php

namespace App\Http\Controllers;

use App\Models\Recetario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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

    public function agregarAlCarrito(Request $request)
{
    try {
        $recetario_id = $request->input('recetario_id');
        $cantidades = $request->input('cantidad');

        $usuario = Auth::user();

        if (!$usuario) {
            return redirect()->route('auth.login.form')->with('danger.message', 'Debes iniciar sesión para agregar recetarios al carrito.');
        }

        foreach ($recetario_id as $id) {
            // Obtener la cantidad asociada con el recetario actual
            $cantidad = $cantidades[$id] ?? 1;

            // Verificar si el recetario ya está en el carrito
            $recetarioEnCarrito = $usuario->recetarios()->where('recetario_id', $id)->first();

            if ($recetarioEnCarrito) {
                // Recetario ya está en el carrito, puedes manejarlo según tus necesidades
                // Por ejemplo, podrías incrementar la cantidad en lugar de generar un error
                $recetarioEnCarrito->pivot->update(['cantidad' => $recetarioEnCarrito->pivot->cantidad + $cantidad]);
            } else {
                // Agregar el recetario al carrito del usuario con la cantidad
                $usuario->recetarios()->attach($id, ['cantidad' => $cantidad]);
            }
        }

        return redirect()
            ->route('carrito.index')
            ->with('status.message', 'Recetarios agregados al carrito exitosamente.');
    } catch (\Exception $e) {
        return redirect()
            ->back()
            ->with('danger.message', 'Error al agregar al carrito: ' . $e->getMessage())
            ->with('status.type', 'danger')
            ->withInput();
    }
}
}
