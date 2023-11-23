@extends('layouts.admin')

@section('title', $recetario->title)

@section('content')

<div class="container mx-auto m-4">
    <div class="bg-white rounded shadow-lg p-4">
        @if ($recetario->cover !== null)
            <img class="w-25rounded mb-4" src="{{ asset('storage/' . $recetario->cover) }}" alt="{{ $recetario->cover_description }}">
        @else
        Acá iria una imagen
        @endif
        <h1>{{ $recetario->title }}</h1>
        <p class=""><span class="fw-bold">Descripcion del recetario:</span> {{ $recetario->description }}</p>
        <p class=" mt-4"><span class="fw-bold">Precio: </span>${{ number_format(($recetario->price), 2, ",", "." )}}</p>
    </div>
</div>
@endsection
