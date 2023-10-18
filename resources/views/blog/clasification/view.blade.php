@extends('layouts.main')

@section('title', 'Clasificación: ' . $clasification->name)

@section('content')

<div class="container mx-auto m-4">

    <h1>Clasificación: {{$clasification->name}}</h1>

    <div class="rounded p-4">
        @foreach ($entradas_blog as $entrada_blog)
        @if ($entrada_blog->clasification_id == $clasification->clasification_id)

        <div>
            <div class="row g-0 justify-content-center">
              <div class="card mb-4 shadow">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{ asset('storage/' . $entrada_blog->cover)}}" class="img-fluid rounded-start" alt="{{ $entrada_blog->cover_description }}">
                      </div>
                      <div class="col-md-8">
                        <div class="card-body">
                          <h3 class="card-title">{{$entrada_blog->title}}</h3>
                          <p class="card-text">{{$entrada_blog->content}}</p>
                          <p class="card-text text-end"><small class="text-body-secondary"><span class="fw-bold">Categoría:</span> {{$entrada_blog->clasification->name}}</small></p>
                        </div>
                      </div>
                    </div>
                  </div>
        @endif
     @endforeach
    </div>
</div>
@endsection
