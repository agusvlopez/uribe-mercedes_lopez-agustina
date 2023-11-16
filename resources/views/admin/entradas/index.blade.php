<?php
/**@var \App\Models\Entrada_Blog[] | \Illuminate\Database\Eloquent\Collection $entradas_blog*/

?>
@extends('layouts.admin')

@section('title', 'Blog')

@section('content')

        <div class="container">
            <h1 class="mb-3">Administrar Entradas de Blog</h1>

            <div class="mb-2">
                <a class="letraVerde font-bold d-flex align-items-center" href="{{ route('admin.blog.form.create')}}"><span class="iconoMas"></span> Publicar nueva entrada de Blog</a>
            </div>



            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Contenido</th>
                    <th>Autor/a</th>
                    <th>Publicación</th>
                    <th>Clasificación</th>
                    <th>Imagen</th>
                    <th>Descripción de la imagen</th>
                    <th>Consejos</th>
                    <th>Acciones</th>
                </tr>
                <tbody>
            @foreach($entradas_blog as $entrada)
            <tr>
                <?php
                ?>
                <td>{{$entrada->blog_id }}</td>
                <td>{{$entrada->title}} </td>
                <td>{{$entrada->recortar_descripcion()}} </td>
                <td>{{$entrada->author}} </td>
                <td>{{$entrada->updated_at}} </td>
                <td>{{$entrada->clasification->name}} </td>
                <td><img class="w-100 mb-2" src="{{ asset('storage/' . $entrada->cover)}}" alt="{{ $entrada->cover_description }}" class="rounded mb-4"></td>
                <td>{{$entrada->cover_description}} </td>
                <td>
                    @foreach ($entrada->consejos as $consejo)
                    <span class="badge bg-secondary"> {{ $consejo->name }}</span>


                    @endforeach
                </td>
                <td>
                    <a href="{{ route('admin.blog.view', ['id' => $entrada->blog_id]   )}}" class="btn btn-primary mb-2 d-block">Ver</a>

                    <a href="{{ route('admin.blog.form.edit', ['id' => $entrada->blog_id] )}}" class="btn btn-secondary mb-2 d-block">Editar</a>

                    <a href="{{ route('admin.blog.form.delete', ['id' => $entrada->blog_id] )}}" class="btn btn-danger d-block">Eliminar</a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
    </table>
    </div>


@endsection
