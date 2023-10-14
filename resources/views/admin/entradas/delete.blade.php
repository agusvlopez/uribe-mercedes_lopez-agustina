@extends('layouts.admin')

@section('title', 'Eliminar ' . $entrada_blog->title)

@section('content')

<div class="container mx-auto m-4">

    <div class="bg-white rounded shadow-lg p-4">
        <img src="" alt="Aca va la imagen" class="rounded mb-4">
        <h1>Eliminar {{ $entrada_blog->title }}</h1>
        <p class=""><span class="fw-bold">Contenido:</span> {{ $entrada_blog->content }}</p>
        <p class=" mt-4"><span class="fw-bold">Autor/a: </span>{{ $entrada_blog->author }}</p>
        <p class=""><span class="fw-bold">Fecha de Publicación: </span>{{ $entrada_blog->updated_at }}</p>

        <div class="d-flex align-content-center p-2">
            <h2 class="text-dark">¿Confirmar eliminación?</h2>
            <form action="{{ url('/admin/entradas-blog/' . $entrada_blog->blog_id . '/eliminar')}}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger p-2 ms-3">Eliminar</button>
            </form>
        </div>
    </div>
</div>
@endsection
