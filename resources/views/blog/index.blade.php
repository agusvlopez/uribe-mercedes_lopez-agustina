@extends('layouts.main')

@section('title', 'Blog')

@section('content')

<div class="container">
<h1 class="d-none">Blog</h1>
    <div class="row">

        <div class="p-4 fs-5">
            <h2 class="mb-3 text-center">Blog de Salud y Bienestar</h2>

            <div class="d-md-flex mb-3 justify-content-center">
                @foreach ($clasifications as $clasification)
                <li class="nav-link me-3"><a class="text-decoration-none link" href="{{route('blog.clasification.view', ['id' => $clasification->clasification_id]   )}}">{{$clasification->name}}</a></li>
                @endforeach
            </div>

            <div class="">
                <div class="row g-0 justify-content-center">
                @foreach ($entradas_blog as $entrada_blog)

                    <div class="card mb-4 ">
                        <div class="row g-0 shadow">
                          <div class="col-md-4">
                            <img src="{{ asset('storage/' . $entrada_blog->cover)}}" class="img-fluid rounded-start" alt="{{ $entrada_blog->cover_description }}">
                          </div>
                          <div class="col-md-8">
                            <div class="card-body">
                              <h3 class="card-title">{{$entrada_blog->title}}</h3>
                              <p class="card-text">{{$entrada_blog->content}}</p>
                              <p class="card-text text-end"><small class="text-body-secondary"><span class="fw-bold">Categoría:</span> {{$entrada_blog->clasification->name}}</small></p>
                            </div>
                            <div class="d-flex justify-content-end">
                                <a href="{{route('blog.view', ['id' => $entrada_blog->blog_id]   )}}" class="btn bg-verde me-3 text-light">Leer entrada</a>
                            </div>
                          </div>

                        </div>
                      </div>
                @endforeach

        </div>
    </div>
</div>
@endsection
