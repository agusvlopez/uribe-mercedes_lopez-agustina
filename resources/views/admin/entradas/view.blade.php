@extends('layouts.admin')

@section('title', $entrada_blog->title)

@section('content')

<div class="container mx-auto m-4">
    <div class="bg-white rounded shadow-lg p-4">
        @if ($entrada_blog->cover !== null)
            <img class="w-25 rounded mb-4" src="{{ asset('storage/' . $entrada_blog->cover)}}" alt="{{ $entrada_blog->cover_description }}">
        @endif

        <h1>{{ $entrada_blog->title }}</h1>
        <p class=""><span class="fw-bold">Contenido:</span> {{ $entrada_blog->content }}</p>
        <p class=" mt-4"><span class="fw-bold">Autor/a: </span>{{ $entrada_blog->author }}</p>
        <p class=""><span class="fw-bold">Fecha de Publicación: </span>{{ $entrada_blog->updated_at }}</p>
        <p><span class="fw-bold">Clasificación: </span>{{ $entrada_blog->clasification->name }}</p>
        <dd>
            @forelse ($entrada_blog->consejos as $consejo)
                <span class="badge bg-secondary"> {{ $consejo->name }}</span>
            @empty
                <span class="small">No tiene consejos asignados</span>
            @endforelse
        </dd>
    </div>
</div>
@endsection
