<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
?>

@extends('layouts.admin')

@section('title', 'Publicar un nuevo Recetario')

@section('content')
<div class="container mx-auto m-4">
    <h1>Publicar un nuevo Recetario</h1>

    @if ($errors->any())

    <p class="mb-3 text-danger"> Hay campos con errores de validación. Por favor, verificar y corregir los valores indicados.</p>

    @endif

    <form action="{{ url('admin/recetarios/nueva') }}" method="post">

        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input
            type="text"
            id="title"
            name="title"
            class="form-control">

            @error('title')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Descripción</label>
            <textarea id="description" name="description" class="form-control"
            ></textarea>
            @error('description')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Precio</label>
            <input type="text" id="price" name="price" class="form-control"
            >
            @error('price')
            <p class="text-danger">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label">Imagen</label>
            <input type="file" id="cover" name="cover" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cover_description" class="form-label">Descripción de la imagen</label>
            <input type="text" id="cover_description" name="cover_description" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</div>
@endsection
