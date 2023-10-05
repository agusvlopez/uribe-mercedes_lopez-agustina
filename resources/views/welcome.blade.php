@extends('layouts.main')

@section('title', 'Página Principal')


@section('content')


<h1 class="none">Pagina Principal</h1>

<div class="portada d-md-flex align-items-center justify-content-center ps-3 pe-3 pt-5">
    <div class="d-md-flex" >
        <div class="col-md-6 p-4 align-self-center">
            <h2>Nunca es tarde para mejorar tus hábitos.</h2>
            <p>Estoy comprometida a ayudarte a <strong>mejorar tus hábitos</strong> a través de <strong>recetas saludables</strong>, fáciles y variadas. Mis <strong>recetarios</strong> son la clave para alcanzar una <strong>alimentación equilibrada</strong> y nutritiva.</p>
            <p>¡El momento de cambiar tus hábitos es ahora!</p>
        </div>
        <div class="col-md-6 align-self-end">
             <img src="{{ asset('imgs/nutricionista-portada.png') }}" alt="Chica sonriente sosteniendo un bowl con frutas y verduras" class="img-fluid">
        </div>
    </div>
</div>
@endsection
