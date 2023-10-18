@extends('layouts.main')

@section('title', $recetario->title)

@section('content')

<div class="container mx-auto m-4 d-flex">

    <div class="bg-white rounded shadow-lg p-4 d-flex">
        <div>
            @if ($recetario->cover !== null)
                <img class="w-100 mb-2 p-3" src="{{ asset('storage/' . $recetario->cover)}}" alt="{{ $recetario->cover_description }}" class="rounded mb-4">
            @endif
        </div>
        <div class="p-3">
            <h1>{{ $recetario->title }}</h1>
            <p class=""><span class="fw-bold">Descripcion del recetario:</span> {{ $recetario->description }}</p>
            <p class=" mt-4"><span class="fw-bold">Precio: </span>${{ number_format(($recetario->price), 2, ",", "." )}}</p>
            <p class=""></p>
        </div>
    </div>
</div>
@endsection
