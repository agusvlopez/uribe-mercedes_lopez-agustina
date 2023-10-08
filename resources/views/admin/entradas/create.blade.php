@extends('layouts.admin')

@section('title', 'Publicar un nuevo Blog')

@section('content')

<div class="container mx-auto m-4">
    <h1>Publicar un nuevo Blog</h1>

    <form action="{{ url('admin/entradas-blog/nueva') }}" method="post">

        @csrf
        <div class="mb-3">
            <label for="title" class="form-label">Título</label>
            <input type="text" id="title" name="title" class="form-control">
        </div>
        <div class="mb-3">
            <label for="content" class="form-label">Contenido</label>
            <textarea id="content" name="content" class="form-control"></textarea>
        </div>
        <div class="mb-3">
            <label for="author" class="form-label">Autor/a</label>
            <input type="text" id="author" name="author" class="form-control">
        </div>
        <div class="mb-3">
            <label for="publicacion" class="form-label">Publicación</label>
            <input type="text" id="publicacion" name="publicacion" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cover" class="form-label">Imagen</label>
            <input type="file" id="cover" name="cover" class="form-control">
        </div>
        <div class="mb-3">
            <label for="cover-description" class="form-label">Descripción de la imagen</label>
            <input type="file" id="cover-description" name="cover-description" class="form-control">
        </div>
        <button type="submit" class="btn btn-primary">Publicar</button>
    </form>
</div>
@endsection
