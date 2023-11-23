@extends('layouts.main')

@section('title', $entrada_blog->title)

@section('content')
<div class="container mx-auto m-4">
    <div class="bg-white rounded shadow-lg p-4 row">
        <div class="col-md-4">
        @if ($entrada_blog->cover !== null)
            <img class="img-fluid rounded mb-4" src="{{ asset('storage/' . $entrada_blog->cover)}}" alt="{{ $entrada_blog->cover_description }}">
        @endif
        </div>
        <div class="col-md-8">
            <h1 class="border-bottom pb-2 mb-2">{{ $entrada_blog->title }}</h1>
            <p class=""><span class="fw-bold">Contenido:</span> {{ $entrada_blog->content }}</p>
            <p class=" mt-4"><span class="fw-bold">Autor/a: </span>{{ $entrada_blog->author }}</p>
            <p class=""><span class="fw-bold">Fecha de Publicación: </span>{{ $entrada_blog->updated_at }}</p>
            <p><span class="fw-bold">Clasificación: </span>{{ $entrada_blog->clasification->name }}</p>
        </div>
    </div>
</div>
@endsection
