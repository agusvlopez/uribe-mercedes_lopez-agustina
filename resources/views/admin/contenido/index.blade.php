@extends('layouts.admin')

@section('title', 'Administración de contenido')

@section('content')
<div class="container">
<h1>Administración de contenido</h1>
<p>Elige qué tipo de contenido vas a administrar</p>
<div class="flex justify-content-center mx-auto p-3">
    <a class="btn btn-secondary m-2" href="<?=url('/admin/recetarios');?>">Administrar Recetarios</a>
    <a class="btn btn-secondary m-2" href="<?=url('/admin/entradas-blog');?>">Administrar Entradas de Blog</a>
</div>
</div>
@endsection
