<?php
/**@var \App\Models\Recetario[] | \Illuminate\Database\Eloquent\Collection $recetarios*/

?>

@extends('layouts.main')

@section('title', 'Recetarios')

@section('content')
<div>

        <div class="bg-verde-screen pt-3 pb-3">
            <div class="container">
                <div class="row d-flex align-items-center p-2">
                    <div class="col-12 col-md-8 p-4 fs-5">
                        <h1 class="pt-3">Recetarios</h1>
                        <h2 class="mb-3">Te traigo mis recetas</h2>
                        <p>Te guiaré y acompañaré, a través de mis <strong>recetarios</strong> con una gran variedad de alimentos, por medio del cual, junt@s, ¡lograremos obtener la calidad de vida que siempre soñaste!</p>
                    </div>
                    <div class="col-12 col-md-4">
                        <img class="img-fluid rounded-3" src="{{ asset('imgs/recetarios-2.jpg') }}" alt="Foto de la nutricionista Ana Perez">
                    </div>
                </div>
            </div>
        </div>

        <div class="container mt-5">
        <div class="row g-0">
            <h2 class="text-center">Todos los recetarios</h2>
        @foreach ($recetarios as $recetario)

            <div class="card m-3 p-4 catalogo">
                <img src="{{ asset('storage/' . $recetario->cover)}}" class="card-img-top img-fluid shadow" alt="{{ $recetario->cover_description }}">
            <h2 class="mt-3 card-title text-center fw-normal fs-5">{{$recetario->title}}</h2>
            <div class="card-body mt-1 mb-1 shadow-sm ">
                <p class="card-text mb-4 fw-lighter">{{$recetario->recortar_descripcion()}}</p>
                <p class="precio">${{ number_format(($recetario->price), 2, ",", "." )}}</p>
                <a href="{{route('recetario.view', ['id' => $recetario->id]   )}}" class="btn p-2 shadow d-block w-50 mx-auto m-2 bg-verde text-light text-uppercase">Ver más</a>
            </div>
            </div>

        @endforeach
    </div>
</div>
</div>
@endsection
