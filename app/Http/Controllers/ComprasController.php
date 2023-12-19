<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Recetario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class ComprasController extends Controller
{
    public function realizarCompra(Request $request)
    {
        try {
            $usuario = Auth::user();
            $recetarioData = $request->input('recetario', []);

            // Obtener los recetarios relacionados con las keys de $recetarioData
            $recetarios = Recetario::whereIn('id', array_keys($recetarioData))->get();

            foreach ($recetarios as $recetario) {
                $recetario_id = $recetario->id;

                // Obtener la cantidad asociada con el recetario actual
                $cantidad = max(1, $recetarioData[$recetario_id] ?? 1);

                // Agregar el recetario al carrito del usuario con la cantidad
                $usuario->recetarios()->attach($recetario_id, ['cantidad' => $cantidad]);

                // Realizar el proceso de compra y almacenar en la tabla de compras
                $compra = new Compra([
                    'recetario_id' => $recetario_id,
                    'recetario_title' => $recetario->title,
                    'recetario_price' => $recetario->price,
                    'cantidad' => $cantidad,
                    'fecha' => now(),
                ]);

                $usuario->compras()->save($compra);
            }

            // Eliminar los recetarios del carrito después de la compra
            $usuario->recetarios()->detach(array_keys($recetarioData));

            return redirect()
                ->route('carrito.index')
                ->with('status.message', 'Recetarios agregados y comprados exitosamente.');
        } catch (\Exception $e) {
            return redirect()
                ->back()
                ->with('danger.message', 'Error al agregar al carrito: ' . $e->getMessage())
                ->with('status.type', 'danger')
                ->withInput();
        }
    }
}
