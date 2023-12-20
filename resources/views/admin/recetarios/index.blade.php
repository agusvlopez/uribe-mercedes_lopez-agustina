<?php
/**@var \App\Models\Recetario[] | \Illuminate\Database\Eloquent\Collection $recetarios*/
?>

@extends('layouts.admin')

@section('title', 'Blog')

@section('content')
<div class="container">
    <h1 class="mb-3">Administrar Recetarios</h1>
    {{-- Buscador --}}
    <div class="mb-4">
        <h2 class="mb-3">Buscar</h2>
        <form action="{{ route('admin.recetarios') }}" method="get">
            <div class="d-flex gap-4">
                <div>
                    <label for="search-title-recetario" class="form-label">Titulo</label>
                    <input type="text" id="search-title-recetario" name="search-title-recetario" class="form-control" value="{{ $searchParams['title'] }}">
                </div>
            </div>
            <button type="submit" class="mt-2 btn shadow bg-verde text-light">Buscar</button>
        </form>
    </div>
        <div class="mb-2">
            <a class="letraVerde font-bold d-flex align-items-center" href="{{ route('admin.recetarios.form.create')}}"> <span class="iconoMas"></span> Publicar nuevo Recetario</a>
        </div>

        <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Fecha de estreno</th>
                <th>Precio</th>
                <th>Imagen</th>
                <th>Descripción de la imagen</th>
                <th>Acciones</th>
            </tr>
            <tbody>
        @foreach($recetarios as $recetario)
        <tr>
            <td>{{$recetario->id }}</td>
            <td>{{$recetario->title}} </td>
            <td>{{$recetario->recortar_descripcion()}} </td>
            <td>${{ number_format(($recetario->price), 2, ",", "." )}} </td>
            <td> <img class="w-100 mb-2" src="{{ asset('storage/' . $recetario->cover)}}" alt="{{ $recetario->cover_description }}" class="rounded mb-4"></td>
            <td> {{$recetario->cover_description}} </td>
            <td>
                <a href="{{route('admin.recetarios.view', ['id' => $recetario->id]   )}}" class="btn btn-primary mb-2 d-block">Ver</a>
                <a href="{{route('admin.recetarios.form.edit', ['id' => $recetario->id] )}}" class="btn btn-secondary mb-2 d-block">Editar</a>
                <a href="{{route('admin.recetarios.form.delete', ['id' => $recetario->id] )}}" class="btn btn-danger d-block">Eliminar</a>
            </td>
        </tr>
        @endforeach
    </tbody>
</thead>
</table>
</div>
@endsection
