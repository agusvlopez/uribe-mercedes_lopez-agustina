@extends('layouts.main')

@section('title', 'Clasificación: ' . $clasification->name)

@section('content')

<div class="container mx-auto">

    <h1 class="text-center">Clasificación: {{$clasification->name}}</h1>

    <div class="rounded p-4">
        @foreach ($entradas_blog as $entrada_blog)
        @if ($entrada_blog->clasification_id == $clasification->clasification_id)

        <div>
            <div class="row g-0 justify-content-center">
              <div class="card mb-4 shadow " style="max-width: 740px; border:none;">
                    <div class="row g-0">
                      <div class="col-md-4">
                        <img src="{{ asset('storage/' . $entrada_blog->cover)}}" class="img-fluid rounded-start" alt="{{ $entrada_blog->cover_description }}">
                      </div>

                          <div class="col-md-8">
                            <div class="card-body">
                              <h3 class="card-title border-bottom pb-2">{{$entrada_blog->title}}</h3>
                              <p class="card-text">{{$entrada_blog->recortar_descripcion()}}</p>
                              <p><small class="bg-verde badge rounded-pill text-light">{{$entrada_blog->clasification->name}}</small></p>
                              <p><small>Publicado el {{$entrada_blog->updated_at}}</small></p>
                            </div>
                            <div class="d-flex justify-content-end pb-3">
                                <a href="{{route('blog.view', ['id' => $entrada_blog->blog_id]   )}}" class="link me-4">Seguir leyendo »</a>
                            </div>
                          </div>
                    </div>
                  </div>
                  @elseif (!$clasification)
                  <p>No existe ninguna entrada con esa clasificación.</p>
        @endif
     @endforeach
    </div>
</div>
@endsection
