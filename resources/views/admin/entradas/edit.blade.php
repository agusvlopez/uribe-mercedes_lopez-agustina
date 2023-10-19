<?php

use App\Models\Clasification;
use Illuminate\Database\Eloquent\Collection;
use App\Models\Entrada_Blog;

/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var Entrada_Blog $entrada_blog */
/** @var Clasification|Collection $clasifications */

?>

@extends('layouts.admin')

@section('title', 'Editar el Blog ' . $entrada_blog->title)

@section('content')

<div class="container mx-auto m-4">
    <h1>Editar el blog: {{ $entrada_blog->title }}</h1>

    @if ($errors->any())

    <p class="mb-3 text-danger"> Hay campos con errores de validación. Por favor, verificar y corregir los valores indicados.</p>

    @endif
    <form action="{{ route('admin.blog.process.edit', ['id' => $entrada_blog->blog_id]) }}" method="post" enctype="multipart/form-data">

        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input
            type="text"
            id="title"
            name="title"
            class="form-control @error('title') is-invalid @enderror"
            value="{{ old('title', $entrada_blog->title ) }}"
            @error('title')
            aria-describedby="error-title"
            aria-invalid="true"
            @enderror

            >
            @error('title')
            <p class="text-danger" id="error-title">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea
            id="content"
            name="content"
            class="form-control @error('content') is-invalid @enderror"
            @error('content')
            aria-describedby="error-content"
            aria-invalid="true"
            @enderror
            >{{ old('content', $entrada_blog->content) }}</textarea>
            @error('content')
            <p class="text-danger" id="error-content">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autor/a</label>
            <input
            type="text"
            id="author"
            name="author"
            class="form-control @error('author') is-invalid @enderror"
            value="{{ old('author', $entrada_blog->author) }}"
            @error('author')
            aria-describedby="error-author"
            aria-invalid="true"
            @enderror
            >
            @error('author')
            <p class="text-danger" id="error-author">{{ $message }}</p>
            @enderror
        </div>
        <div class="class mb-3">
            <label for="clasification_id" class="form-label">Clasificación</label>
            <select
            name="clasification_id"
            id="clasification_id"
            class="form-control @error('clasification_id') is-invalid @enderror"
            @error('clasification_id')
            aria-describedby="error-clasification_id"
            aria-invalid="true"
            @enderror
            >
            <option value="">Seleccioná un valor</option>
            @foreach ($clasifications as $clasification)
                <option
                value="{{ $clasification->clasification_id}}"
                @selected(old('clasification_id', $clasification->clasification_id) == $entrada_blog->clasification_id)
                >
                    {{ $clasification->name }}
                </option>
            @endforeach
            </select>
            @error('clasification_id')
            <p class="text-danger" id="error-clasification_id">{{ $message }}</p>
            @enderror
        </div>
        <div class="mb-3">
            @if ($entrada_blog->cover && Storage::has($entrada_blog->cover))
			<label for="cover_actual" class="form-label">Imagen Actual</label>
			<img src="{{ asset('storage/' . $entrada_blog->cover)}}" alt="{{ $entrada_blog->cover_description }}" class="img-fluid shadow-sm d-block w-25">
			<input class="form-control" type="hidden" id="cover_actual" name="cover_actual" required value="<?=  $entrada_blog->cover ?>">
            @else
                <p>No existe ninguna imagen.</p>
            @endif
		</div>

        <div class="mb-3">
            <label for="cover" class="form-label">Nueva imagen</label>
            <input
            type="file"
            id="cover"
            name="cover"
            class="form-control"
            >
        </div>

        <div class="mb-3">
            <label for="cover_description" class="form-label">Descripción de la imagen</label>
            <input
            type="text"
            id="cover_description"
            name="cover_description"
            class="form-control"
            value="{{ old('cover_description', $entrada_blog->cover_description) }}">
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</div>
@endsection
