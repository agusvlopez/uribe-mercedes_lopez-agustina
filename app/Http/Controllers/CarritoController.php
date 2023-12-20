<?php

namespace App\Http\Controllers;

use App\Models\Recetario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class CarritoController extends Controller
{
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
                'quantity' => $recetario->pivot->cantidad,
                'currency_id' => 'ARS'
            ];
            $totalPrice += $recetario->price * $recetario->pivot->cantidad;
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
                return redirect()
                    ->route('auth.login.form')
                    ->with('danger.message', 'Debes iniciar sesión para agregar recetarios al carrito.');
            }

            foreach ($recetario_id as $id) {
                // Obtener la cantidad asociada con el recetario actual
                $cantidad = $cantidades[$id] ?? 1;

                // Verificar si el recetario ya está en el carrito
                $recetarioEnCarrito = $usuario->recetarios()->where('recetario_id', $id)->first();

                if ($recetarioEnCarrito) {
                    $recetarioEnCarrito->pivot->update(['cantidad' => $recetarioEnCarrito->pivot->cantidad =+ $cantidad]);
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

    public function eliminarDelCarrito(Request $request, $recetario_id)
    {
        try {
            $usuario = Auth::user();

            if (!$usuario) {
                return redirect()
                    ->route('auth.login.form')
                    ->with('danger.message', 'Debes iniciar sesión para modificar el carrito.');
            }

            // Buscar el recetario en el carrito del usuario
            $usuario->recetarios()->where('recetario_id', $recetario_id)->firstOrFail();

            // Eliminar el recetario del carrito
            $usuario->recetarios()->detach($recetario_id);

            return redirect()
                ->route('carrito.index')
                ->with('status.message', 'Recetario eliminado del carrito exitosamente.');

        } catch (\Exception $e) {
            // Manejar el caso en que el recetario no se encuentra en el carrito
            return redirect()
                ->route('carrito.index')
                ->with('danger.message', 'El recetario no se encuentra en el carrito.')
                ->with('status.type', 'danger');
        } catch (\Exception $e) {
            return redirect()
                ->route('carrito.index')
                ->with('danger.message', 'Error al eliminar del carrito: ' . $e->getMessage())
                ->with('status.type', 'danger');
        }
    }

    public function actualizarCantidad(Request $request, $recetario_id)
    {
        try {
            $usuario = Auth::user();

            if (!$usuario) {
                return redirect()
                    ->route('auth.login.form')
                    ->with('danger.message', 'Debes iniciar sesión para modificar el carrito.');
            }

            // Buscar el recetario en el carrito del usuario
            $recetarioEnCarrito = $usuario->recetarios()->where('recetario_id', $recetario_id)->firstOrFail();

            // Validar la nueva cantidad (mínimo 1)
            $request->validate([
                'cantidad' => 'required|integer|min:1',
            ]);

            // Actualizar la cantidad en el carrito
            $recetarioEnCarrito->pivot->update(['cantidad' => $request->input('cantidad')]);

            return redirect()
                ->route('carrito.index')
                ->with('status.message', 'Cantidad actualizada exitosamente.');

        } catch (\Exception $e) {
            return redirect()
                ->route('carrito.index')
                ->with('danger.message', 'Error al actualizar la cantidad: ' . $e->getMessage())
                ->with('status.type', 'danger');
        }
    }
}
