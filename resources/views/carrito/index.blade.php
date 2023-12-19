<?php
use App\Models\Recetario;
use Illuminate\Database\Eloquent\Collection;

/** @var Recetario[]|Collection $recetarios */
/** @var Preference[]|Collection $preference */
/** @var string $mpPublicKey */
/** @var int|float $totalPrice */
?>

@extends('layouts.main')

@section('title', 'Carrito de compras')

@section('content')

<div class="container mx-auto">
    <div class="row">
        <div class="p-4 fs-5">
            <h1 class="mb-3 text-center">Carrito de compras</h1>

            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Titulo</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recetarios as $recetario)
                        <tr>
                            <td>
                                @if ($recetario->cover !== null)
                                <img class="w-25 rounded mb-4" src="{{ asset('storage/' . $recetario->cover) }}" alt="{{ $recetario->cover_description }}">
                                @else
                                Acá iria una imagen
                                @endif
                            </td>
                            <td>{{ $recetario->title }}</td>
                            <td>{{ $recetario->price }}</td>
                            <td>{{ $recetario->pivot->cantidad }}</td>
                            <td>{{ $recetario->price * $recetario->pivot->cantidad }}</td>
                        </tr>
                    @endforeach
                        <tr>
                            <td colspan="4"><b>Total:</b></td>
                            <td><b>${{ $totalPrice }}</b></td>
                        </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end">
                <a href="{{route('mp.pago')}}" class="btn btn-primary mb-2 d-block">Comprar</a>
            </div>
        </div>
    </div>
</div>
@endsection
