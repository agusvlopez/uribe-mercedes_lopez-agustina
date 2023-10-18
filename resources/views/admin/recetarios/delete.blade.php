@extends('layouts.admin')

@section('title', 'Eliminar ' . $recetario->title)

@section('content')

<div class="container mx-auto m-4">

    <div class="bg-white rounded shadow-lg p-4">
        <img class="w-25 mb-2" src="{{ asset('storage/' . $recetario->cover)}}" alt="{{ $recetario->cover_description }}" class="rounded mb-4">
        <h1 class="mb-3">Eliminar {{ $recetario->title }}</h1>
        <p>Estas por eliminar el siguiente recetario:</p>
        <p><span class="fw-bold">Nombre:</span> {{ $recetario->title }}</p>
        <p class=""><span class="fw-bold">Descripcion del recetario:</span> {{ $recetario->description }}</p>
        <p class=" mt-4"><span class="fw-bold">Precio: </span>${{ number_format(($recetario->price), 2, ",", "." )}}</p>
        <div class="d-flex align-content-center p-2">
            <h2 class="text-dark">¿Confirmar eliminación?</h2>
            <form action="{{ route('admin.recetarios.process.delete', ['id' => $recetario->id] )}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger p-2 ms-3">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
