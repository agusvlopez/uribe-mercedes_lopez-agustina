@extends('layouts.admin')

@section('title', $recetario->title)

@section('content')

<div class="container mx-auto m-4">

    <div class="bg-white rounded shadow-lg p-4">
        <img src="" alt="Aca va la imagen" class="rounded mb-4">
        <h1>{{ $recetario->title }}</h1>
        <p class=""><span class="fw-bold">Descripcion del recetario:</span> {{ $recetario->description }}</p>
        <p class=" mt-4"><span class="fw-bold">Precio: </span>${{ $recetario->price }}</p>
        <p class=""></p>
    </div>
</div>
@endsection
