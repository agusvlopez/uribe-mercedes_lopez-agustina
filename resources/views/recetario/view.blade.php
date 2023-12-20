@extends('layouts.main')

@section('title', $recetario->title)

@section('content')

<div class="container mx-auto m-4 d-flex">
    <div class="row bg-white rounded shadow-lg p-4 d-flex">
        <div class="col-md-4">
            @if ($recetario->cover !== null)
                <img class="w-100 rounded mb-4 p-3" src="{{ asset('storage/' . $recetario->cover)}}" alt="{{ $recetario->cover_description }}">
            @endif

        </div>
        <div class="p-3 col-md-8">
            <h1 class="border-bottom pb-2 mb-2">{{ $recetario->title }}</h1>
            <p class=""><span class="fw-bold">Descripcion del recetario:</span> {{ $recetario->description }}</p>
            <p class=" mt-4"><span class="fw-bold">Precio: </span>${{ number_format(($recetario->price), 2, ",", "." )}}</p>
            <div class="d-flex justify-content-end">
                @auth
                    @php
                        // Obtener la cantidad actual del recetario en el carrito (si está presente)
                        $cantidadActual = optional(auth()->user()->recetarios->where('id', $recetario->id)->first())->pivot->cantidad ?? 1;
                    @endphp

                    <form action="{{ route('carrito.agregar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="recetario_id[]" value="{{ $recetario->id }}">

                        <label for="cantidad_{{ $recetario->id }}">Cantidad:</label>
                        <input type="number" name="cantidad[{{ $recetario->id }}]" value="{{ $cantidadActual }}" min="1"><br>

                        <button type="submit" class="btn p-2 shadow mt-2 bg-verde text-light">Agregar al carrito</button>
                    </form>
                @else
                <div class="d-flex align-items-center gap-2">
                    <p>Para agregar al carrito, iniciá sesión.</p>
                    <a href="{{ route('auth.login.form') }}" class="btn shadow  bg-verde text-light">Iniciar sesión</a>
                </div>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
