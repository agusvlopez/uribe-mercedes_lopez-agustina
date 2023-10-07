@extends('layouts.admin')

@section('title', 'Blog')

@section('content')

        <div class="container">
            <h1>Administrar Entradas de Blog</h1>
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
                <td>$ {{$entrada->author}} </td>
                <td>{{$entrada->updated_at}} </td>
                <td></td>
            </tr>
            @endforeach
        </tbody>
    </thead>
    </table>
    </div>


@endsection
