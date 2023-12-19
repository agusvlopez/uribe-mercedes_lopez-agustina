<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Recetario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class MercadoPagoController extends Controller
{
    public function showForm()
    {
        // $recetarios = Recetario::whereIn('id', [1, 3])->get();
        // Obtén el usuario autenticado
        $usuario = Auth::user();

        // Obtén los recetarios del usuario
        $recetarios = $usuario->recetarios;
        $items = [];
        $totalPrice = 0;

        foreach($recetarios as $recetario)
        {
            $items[] =
            [
                'title' => $recetario->title,
                'unit_price' => $recetario->price,
                'quantity' => $recetario->pivot->cantidad,
                'currency_id' => 'ARS'
            ];
            $totalPrice += $recetario->price *  $recetario->pivot->cantidad;
        }

        //Configuración de Mercado Pago
        MercadoPagoConfig::setAccessToken(env('MP_ACCESS_TOKEN'));

        $client = new PreferenceClient();
        $preference = $client->create(
            [
                'items' => $items,

                //Urls de retorno
                'back_urls' => [
                    'success' => route('mp.success'),
                    'pending' => route('mp.pending'),
                    'failure' => route('mp.failure'),
                ]
            ]);

        return view('mp.form', [
            'recetarios' => $recetarios,
            'totalPrice' => $totalPrice,
            'preference' => $preference,
            'mpPublicKey' => env('MP_PUBLIC_KEY')
        ]);
    }

    public function success(Request $request)
    {
        try {
            // Obtén el usuario autenticado
            $usuario = Auth::user();

            // Obtén los recetarios del usuario
            $recetarios = $usuario->recetarios;

            // Realizar el proceso de compra y almacenar en la tabla de compras
            DB::transaction(function () use ($usuario, $recetarios) {
                foreach ($recetarios as $recetario) {
                    // Obtener la cantidad asociada con el recetario actual
                    $cantidad = $recetario->pivot->cantidad;

                    $compra = new Compra([
                        'user_id' => $usuario->id,
                        'recetario_id' => $recetario->id,
                        'recetario_title' => $recetario->title,
                        'recetario_price' => $recetario->price,
                        'cantidad' => $cantidad,
                        'fecha' => now(),
                    ]);

                    $compra->recetario()->associate($recetario);
                    $compra->usuario()->associate($usuario);
                    $compra->save();
                }

                // Eliminar los recetarios del carrito después de un pago exitoso
                $usuario->recetarios()->detach($recetarios->pluck('id'));
            });

            // Resto de la lógica de la función success
            echo 'Success!';
            dd($request);
        } catch (\Exception $e) {
            // Manejar cualquier error que pueda ocurrir durante el proceso
            // Puedes redirigir al usuario a una página de error o realizar otras acciones necesarias
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function pending(Request $request)
    {
        echo 'Pendiente...';
        dd($request);
    }

    public function failure(Request $request)
    {
        echo 'Error';
        dd($request);
    }
}
