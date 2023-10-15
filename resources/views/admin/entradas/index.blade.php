<?php
/**@var \App\Models\Entrada_Blog[] | \Illuminate\Database\Eloquent\Collection $entradas_blog*/

?>
@extends('layouts.admin')

@section('title', 'Blog')

@section('content')

        <div class="container">
            <h1 class="mb-3">Administrar Entradas de Blog</h1>

            <div class="mb-2">
                <a class="letraVerde font-bold d-flex align-items-center" href="{{ url('/admin/entradas-blog/nueva')}}"><span class="iconoMas"></span> Publicar nueva entrada de Blog</a>
            </div>



            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Contenido</th>
                    <th>Autor/a</th>
                    <th>Publicación</th>
                    <th>Imagen</th>
                    <th>Descripción de la imagen</th>
                    <th>Acciones</th>
                </tr>
                <tbody>
            @foreach($entradas_blog as $entrada)
            <tr>
                <?php
                ?>
                <td>{{$entrada->blog_id }}</td>
                <td>{{$entrada->title}} </td>
                <td>{{$entrada->content}} </td>
                <td>{{$entrada->author}} </td>
                <td>{{$entrada->updated_at}} </td>
                <td>Imagen </td>
                <td>{{$entrada->cover_description}} </td>
                <td>
                    <a href="{{url('/admin/entradas-blog/' . $entrada->blog_id )}}" class="btn btn-primary mb-2">Ver</a>

                    <a href="{{url('/admin/entradas-blog/' . $entrada->blog_id . '/editar')}}" class="btn btn-secondary mb-2">Editar</a>

                    <a href="{{url('/admin/entradas-blog/' . $entrada->blog_id . '/eliminar')}}" class="btn btn-danger">Eliminar</a>


                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
    </table>
    </div>


@endsection
