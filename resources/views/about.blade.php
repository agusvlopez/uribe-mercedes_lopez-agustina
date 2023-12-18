@extends('layouts.main')

@section('title', 'Sobre mi')

@section('content')
    <div class="container">
        <h1 class="d-none">Sobre mi</h1>
        <div class="row mt-5 p-4 mb-5">
            <div class="col-12 col-md-6">
                <img class="img-fluid d-block rounded-3 shadow" src="{{ asset('imgs/nutricionista-ana_perez.jpg') }}" alt="Foto de la nutricionista Ana Perez">
            </div>
            <div class="col-12 col-md-6 fs-5">
                <h2>¡Hola!</h2>
                    <h3>Soy Ana Perez</h3>
                    <p>Hace más de 10 años que me encuentro involucrada en el campo de la Nutrición, y hace 5 años que trabajo activamente como <strong>Nutricionista Matriculada</strong>.</p>
                    <p>Soy una persona sumamente empática, que sabe escuchar, con una mirada particularmente reflexiva.</p>
                    <p>Como profesional presento un enfoque orientado a la resolución de problemas, a través del compromiso y la experiencia.</p>
                    <p>En mis sesiones cada encuentro es único. Buscamos otras miradas del problema a tratar.</p>

                    <p class="fs-3">Me hace muy feliz y disfruto mucho conectar con mis pacientes.</p>
            </div>

        </div>
    </div>
@endsection
