@extends('layouts.admin')

@section('title', 'Administración de contenido')

@section('content')
<div class="container">

    <h1 class="text-center mb-2">Administración de contenido</h1>

    <div class="col-12 col-lg-6 mx-auto m-2">
        <img src="../imgs/portada.jpg" class="img-fluid rounded-2" alt="Imagen de comida saludable">
    </div>


    <div class="flex justify-content-center mx-auto p-3 text-center">
        <a class="btn btn-secondary m-2 bg-verde" href="<?=route('admin.recetarios');?>">Administrar Recetarios</a>
        <a class="btn btn-secondary m-2 bg-verde" href="<?=route('admin.blog');?>">Administrar Entradas de Blog</a>
    </div>
</div>
@endsection
