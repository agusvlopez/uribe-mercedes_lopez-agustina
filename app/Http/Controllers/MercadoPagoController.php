<?php

namespace App\Http\Controllers;

use App\Models\Recetario;
use Illuminate\Http\Request;
use MercadoPago\Client\Preference\PreferenceClient;
use MercadoPago\MercadoPagoConfig;

class MercadoPagoController extends Controller
{
    public function showForm()
    {
        $recetarios = Recetario::whereIn('id', [1, 3])->get();

        $items = [];
        $totalPrice = 0;

        foreach($recetarios as $recetario)
        {
            $items[] =
            [
                'title' => $recetario->title,
                'unit_price' => $recetario->price,
                'quantity' => 1,
                'currency_id' => 'ARS'
            ];
            $totalPrice += $recetario->price * 1;
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
        echo 'Success!';
        dd($request);
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
