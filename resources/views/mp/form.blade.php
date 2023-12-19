<?php
use App\Models\Recetario;
use Illuminate\Database\Eloquent\Collection;

/** @var Recetario[]|Collection $recetarios */
/** @var Preference[]|Collection $preference */
/** @var string $mpPublicKey */
/** @var int|float $totalPrice */
?>

@extends('layouts.admin')

@section('title', 'Realizar pago')

@section('content')
<div class="container">
    <h1 class="text-center mb-2">Finalizar compra</h1>

    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Titulo</th>
                <th>Precio</th>
                <th>Cantidad</th>
                <th>Subtotal</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($recetarios as $recetario)
                <tr>
                    <td>{{ $recetario->title }}</td>
                    <td>{{ $recetario->price }}</td>
                    <td>{{ $recetario->pivot->cantidad }}</td>
                    <td>{{ $recetario->price * $recetario->pivot->cantidad }}</td>
                </tr>
            @endforeach
                <tr>
                    <td colspan="3"><b>Total:</b></td>
                    <td><b>${{ $totalPrice }}</b></td>
                </tr>
        </tbody>
    </table>
    {{-- Boton de mercado pago --}}
    <div id="checkout"></div>
</div>

<script src="https://sdk.mercadopago.com/js/v2"></script>
<script>
    const mp = new MercadoPago('<?= $mpPublicKey;?>');

    //Inicializo el botón de cobro.
    mp.bricks().create('wallet', 'checkout', {
        initialization: {
            preferenceId: '<?= $preference->id;?>',
        }
    })
</script>
@endsection
