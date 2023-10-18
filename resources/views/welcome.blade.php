@extends('layouts.main')

@section('title', 'Página Principal')


@section('content')


<h1 class="none">Página Principal</h1>

<section class="portada d-md-flex align-items-center justify-content-center ps-3 pe-3 pt-5 mb-5">
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


</section>

<div class="container mb-5">
        <div class="row d-flex align-items-center bg-light">
            <div class="col-md-6">
                <h2>Conocé mis recetarios</h2>
                <p class="mt-3">Mis recetarios están llenos de secretos, ingredientes exquisitos y sabores que al mismo tiempo son saludables. Atrevete a explorar nuevas recetas sencillas sin caer en lo insulso.</p>
                <p>Las recetas son sanas, sabrosas y variadas, habiendo opciones apta celíacos, vegetarianas y veganas.</p>
                <h3>Comenzá a disfrutar hoy los beneficios de un estilo de vida saludable.</h3>
                <div class="d-flex justify-content-end mt-4">
                    <a href="<?=route('recetarios.index');?>" class="link fs-5 text-end">Ver todos los recetarios »</a>
                </div>
            </div>
            <div  class="col-md-6">
                <img src="{{ asset('imgs/recetarios-inicio.png') }}" alt="Libro de recetarios" class="img-fluid">
            </div>
        </div>
</div>
<div class="container mb-5">
    <div class="row d-flex align-items-center bg-light">
        <div  class="col-md-6">
            <img src="{{ asset('imgs/blog-1.jpg') }}" alt="Imagen de comida saludable" class="img-fluid rounded-2 w-75 p-5">
        </div>
        <div class="col-md-6">
            <h2>Conocé mi Blog</h2>
            <p class="mt-3">En este espacio, quiero compartir contigo contenido que te sea útil relacionado con el mundo de la salud en general y de la nutrición en particular. Publicaré contenido variado, como guías y métodos que te ayuden a seguir una buena alimentación, así como entrevistas y artículos enfocados a dar visibilidad a otros profesionales de nuestro sector.</p>
            <h3>Disfrutá del éste maravilloso contenido informativo y nutricional para hacer tu vida más saludable</h3>
            <div class="d-flex justify-content-end mt-4">
                <a href="<?=route('blog.index');?>" class="link fs-5 text-end">Ver todos los artículos »</a>
            </div>
        </div>

    </div>
</div>

@endsection
