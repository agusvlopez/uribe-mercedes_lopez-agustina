<?php
/**@var \App\Models\Recetario[] | \Illuminate\Database\Eloquent\Collection $recetarios*/

?>

@extends('layouts.admin')

@section('title', 'Blog')

@section('content')
<div class="container">
        <h1 class="mb-2">Administrar Recetarios</h1>

        <div class="mb-2">
            <a href="{{ url('/admin/recetarios/nueva')}}">Publicar nuevo Recetario</a>
        </div>

        <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Titulo</th>
                <th>Fecha de estreno</th>
                <th>Precio</th>
                <th>Acciones</th>
            </tr>
            <tbody>
        @foreach($recetarios as $recetario)
        <tr>
            <?php
            ?>
            <td>{{$recetario->id }}</td>
            <td>{{$recetario->title}} </td>
            <td>{{$recetario->description}} </td>
            <td>$ {{$recetario->price}} </td>
            <td> <a href="{{url('/admin/recetarios/' . $recetario->id )}}" class="btn btn-primary">Ver</a></td>
        </tr>
        @endforeach
    </tbody>
</thead>
</table>
</div>
@endsection
