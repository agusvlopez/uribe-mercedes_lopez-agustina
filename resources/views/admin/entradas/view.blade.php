@extends('layouts.admin')

@section('title', $entrada_blog->title)

@section('content')

<div class="container mx-auto m-4">

    <div class="bg-white rounded shadow-lg p-4">
        <img src="" alt="Aca va la imagen" class="rounded mb-4">
        <h1>{{ $entrada_blog->title }}</h1>
        <p class=""><span class="fw-bold">Contenido:</span> {{ $entrada_blog->content }}</p>
        <p class=" mt-4"><span class="fw-bold">Autor/a: </span>{{ $entrada_blog->author }}</p>
        <p class=""><span class="fw-bold">Fecha de Publicación: </span>{{ $entrada_blog->updated_at }}</p>
    </div>
</div>
@endsection
