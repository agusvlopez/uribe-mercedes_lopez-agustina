<?php
/**@var \App\Models\Entrada_Blog[] | \Illuminate\Database\Eloquent\Collection $entradas_blog*/

?>
@extends('layouts.admin')

@section('title', 'Blog')

@section('content')

        <div class="container">
            <h1 class="mb-2">Administrar Entradas de Blog</h1>

            <div class="mb-2">
                <a href="{{ url('/admin/entradas-blog/nueva')}}">Publicar nuevo Blog</a>
            </div>



            <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titulo</th>
                    <th>Contenido</th>
                    <th>Autor/a</th>
                    <th>Publicación</th>
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
                <td>
                    <a href="{{url('/admin/entradas-blog/' . $entrada->blog_id )}}" class="btn btn-primary">Ver</a>
                    <form action="{{ url('/admin/entradas-blog/' . $entrada->blog_id . '/eliminar')}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </thead>
    </table>
    </div>


@endsection
