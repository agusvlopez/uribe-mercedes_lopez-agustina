<?php
/** @var \Illuminate\Support\ViewErrorBag $errors */
/** @var Entrada_Blog $entrada */

use App\Models\Entrada_Blog;
?>

@extends('layouts.admin')

@section('title', 'Editar el Blog ' . $entrada_blog->title)

@section('content')

<div class="container mx-auto m-4">
    <h1>Editar el blog: {{ $entrada_blog->title }}</h1>

    @if ($errors->any())

    <p class="mb-3 text-danger"> Hay campos con errores de validación. Por favor, verificar y corregir los valores indicados.</p>

    @endif
    <form action="{{ url('admin/entradas-blog/' . $entrada_blog->blog_id . '/editar') }}" method="post">

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
            value="{{ old('content', $entrada_blog->content) }}"
            @error('content')
            aria-describedby="error-content"
            aria-invalid="true"
            @enderror>{{ old('content') }}</textarea>
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
            class="form-control"
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
        <div class="mb-3">
            <label for="cover" class="form-label">Imagen</label>
            <input type="file" id="cover" name="cover" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cover_description" class="form-label">Descripción de la imagen</label>
            <input type="text" id="cover_description" name="cover_description" class="form-control" value="{{ old('cover_description', $entrada_blog->cover_description) }}">
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</div>
@endsection
