<?php
/**@var \App\Models\Recetario[] | \Illuminate\Database\Eloquent\Collection $recetarios*/

?>

@extends('layouts.admin')

@section('title', 'Blog')

@section('content')
<div class="container">
        <h1 class="mb-3">Administrar Recetarios</h1>

        <div class="mb-2">
            <a class="letraVerde font-bold d-flex align-items-center" href="{{ url('/admin/recetarios/nueva')}}"> <span class="iconoMas"></span> Publicar nuevo Recetario</a>
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
            <td>
                <a href="{{url('/admin/recetarios/' . $recetario->id )}}" class="btn btn-primary mb-2">Ver</a>

                <a href="{{url('/admin/recetarios/' . $recetario->id . '/editar')}}" class="btn btn-secondary mb-2">Editar</a>

                <a href="{{url('/admin/recetarios/' . $recetario->id . '/eliminar')}}" class="btn btn-danger">Eliminar</a>


            </td>
        </tr>
        @endforeach
    </tbody>
</thead>
</table>
</div>
@endsection
