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
            @if (!$recetarios->isEmpty())
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>Imagen</th>
                        <th>Titulo</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Subtotal</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($recetarios as $recetario)
                        <tr>
                            <td>
                                @if ($recetario->cover !== null)
                                <img class="w-25 rounded mb-4" src="{{ asset('storage/' . $recetario->cover) }}" alt="{{ $recetario->cover_description }}">
                                @else
                                <img src="{{ asset('imgs/no-image.jpg') }}" class="img-fluid">
                                @endif
                            </td>
                            <td>{{ $recetario->title }}</td>
                            <td>${{ $recetario->price }}</td>
                            <td>
                                <form action="{{ route('carrito.actualizar', ['recetario_id' => $recetario->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="">
                                    <input type="number" name="cantidad" value="{{ $recetario->pivot->cantidad }}" min="1">
                                    <button type="submit" class="btn  btn-primary mt-2">Actualizar cantidad</button>
                                </form>
                            </td>
                            <td>${{ $recetario->price * $recetario->pivot->cantidad }}</td>
                            <td>
                                <form action="{{ route('carrito.eliminar', ['recetario_id' => $recetario->id]) }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="_method" value="">
                                    <button type="submit" class="btn btn-danger">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                        <tr>
                            <td colspan="5"><b>Total:</b></td>
                            <td><b>${{ $totalPrice }}</b></td>
                        </tr>
                </tbody>
            </table>
            <div class="d-flex justify-content-end mb-2">
                <a href="{{route('mp.pago')}}" class="btn shadow  bg-verde text-light">Comprar</a>
            </div>
            @else
            <div class="d-flex p-2 gap-2 mt-4 align-items-center justify-content-center">
                <p>No hay recetarios en el carrito aún.</p>
                <a href="{{route('recetarios.index')}}" class="btn shadow  bg-verde text-light d-block mb-2">¡Obtené un recetario acá!</a>
            </div>
            @endif
        </div>
    </div>
</div>
@endsection
