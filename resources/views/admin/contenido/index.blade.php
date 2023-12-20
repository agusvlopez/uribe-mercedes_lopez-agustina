@extends('layouts.admin')

@section('title', 'Administración de contenido')

@section('content')
<div class="container">
    <h1 class="text-center mb-2">Administración de contenido</h1>

    <div class="col-12 col-lg-6 mx-auto m-2">
        <img src="../imgs/portada.jpg" class="img-fluid rounded-2" alt="Comida saludable">
    </div>

    <div class="flex justify-content-center mx-auto p-3 text-center">
        <a class="btn btn-secondary m-2 bg-verde" href="<?=route('admin.recetarios');?>">Administrar Recetarios</a>
        <a class="btn btn-secondary m-2 bg-verde" href="<?=route('admin.blog');?>">Administrar Entradas de Blog</a>
        <a class="btn btn-secondary m-2 bg-verde" href="<?=route('admin.users');?>">Ver compras de clientes</a>
    </div>

    <div class="flex justify-content-center mx-auto p-3 text-center">
        @isset($recetariosMasVendidos)
            <div class="flex justify-content-center mx-auto p-3 text-center">
                <h2>Recetarios más vendidos:</h2>
                <div>
                    <canvas id="myChart"></canvas>
                </div>
                <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
                <script>
                    document.addEventListener('DOMContentLoaded', function() {
                        const ctx = document.getElementById('myChart');
                        if (ctx) {
                            new Chart(ctx, {
                                type: 'bar',
                                data: {
                                    labels: [
                                        @foreach ($recetariosMasVendidos as $recetario)
                                            '{{ $recetario['recetario']->title }}',
                                        @endforeach
                                    ],
                                    datasets: [{
                                        label: 'Cantidad vendida',
                                        data: [
                                            @foreach ($recetariosMasVendidos as $recetario)
                                                '{{ $recetario['cantidad_total'] }}',
                                            @endforeach
                                        ],
                                        backgroundColor: [
                                            'rgba(255, 159, 64, 0.2)',
                                        ],
                                        borderColor: [
                                            'rgb(255, 159, 64)',
                                        ],
                                        borderWidth: 1
                                    }]
                                },
                                options: {
                                    scales: {
                                        y: {
                                            beginAtZero: true
                                        }
                                    }
                                }
                            });
                        }
                    });
                </script>
            </div>
        @endisset
    </div>
</div>
@endsection
