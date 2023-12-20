<?php

namespace App\Http\Controllers;

use App\Models\Compra;
use App\Models\Recetario;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class MercadoPagoController extends Controller
{
    public function showForm()
    {
        $usuario = Auth::user();

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

    public function success()
    {
        try {
            $auth = Auth::user();
            $usuario = User::find($auth->id);
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
                    ]);

                    $compra->recetario()->associate($recetario);
                    $compra->usuario()->associate($usuario);
                    $compra->save();
                }

                // Eliminar los recetarios del carrito después de un pago exitoso
                $usuario->recetarios()->detach($recetarios->pluck('id'));
            });

            return view('compra.success');

        } catch (\Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


    public function pending()
    {
        return view('compra.pending');
    }

    public function failure()
    {
        return view('compra.failure');
    }
}
