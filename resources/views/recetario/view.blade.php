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
            <p>{{$recetario}}</p>
            <div class="d-flex justify-content-end">
                {{-- Verificar si el usuario está autenticado --}}
                @auth
                    @php
                        // Obtener la cantidad actual del recetario en el carrito (si está presente)
                        $cantidadActual = optional(auth()->user()->recetarios->where('id', $recetario->id)->first())->pivot->cantidad ?? 1;
                    @endphp

                    <form action="{{ route('carrito.agregar') }}" method="POST">
                        @csrf
                        <input type="hidden" name="recetario_id[]" value="{{ $recetario->id }}">

                        <label for="cantidad_{{ $recetario->id }}">Cantidad para {{ $recetario->title }}:</label>
                        <input type="number" name="cantidad[{{ $recetario->id }}]" value="{{ $cantidadActual }}" min="1"><br>

                        <button type="submit" class="btn p-2 shadow mt-2 bg-verde text-light">Agregar al carrito</button>
                    </form>
                @else
                    {{-- Mostrar un mensaje o redirigir al usuario a iniciar sesión si no está autenticado --}}
                    <p>Para agregar al carrito, inicia sesión.</p>
                    <a href="{{ route('auth.login.form') }}" class="btn btn-primary">Iniciar sesión</a>
                @endauth
            </div>
        </div>
    </div>
</div>
@endsection
