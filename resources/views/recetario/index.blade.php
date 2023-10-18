<?php
/**@var \App\Models\Recetario[] | \Illuminate\Database\Eloquent\Collection $recetarios*/

?>

@extends('layouts.main')

@section('title', 'Recetarios')

@section('content')
<div class="container">
        <h1 class="d-none">Recetarios</h1>
        <div class="row  mt-5">
            <div class="col-12 col-md-6">
                <img class="img-fluid rounded-3" src="{{ asset('imgs/recetarios-2.jpg') }}" alt="Foto de la nutricionista Ana Perez">
            </div>
            <div class="col-12 col-md-6 p-4 fs-5">
                <h2>Hacer dieta no es la solución</h2>
                    <h3>Te traigo mis recetas</h3>
                    <p>Te guiaré y acompañaré, a través de un <strong>Plan de Bienestar Integral</strong> especialmente diseñado para vos, por medio del cual, junt@s, lograremos obtener la calidad de vida que siempre soñaste!</p>

                    <h3>Comenzá a disfrutar hoy los beneficios de un estilo de vida saludable.</h3>
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
                <p class="card-text mb-4 fw-lighter">{{$recetario->description}}</p>
                <p class="precio">${{ number_format(($recetario->price), 2, ",", "." )}}</p>
                <a href="{{route('recetario.view', ['id' => $recetario->id]   )}}" class="btn p-2 shadow d-block w-50 mx-auto m-2 bg-verde text-light text-uppercase">Ver más</a>
            </div>
            </div>

        @endforeach
    </div>
</div>
</div>
@endsection
