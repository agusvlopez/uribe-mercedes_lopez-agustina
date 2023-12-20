<?php
use Illuminate\Database\Eloquent\Collection;
?>

@extends('layouts.main')

@section('title', 'Compra exitosa')

@section('content')
<div class="container p-4">
    <div class="text-center">
        <h1 class="mb-4">¡Compra exitosa!</h1>
        <p>¡Gracias por comprar mis recetarios! En instantes te va a llegar un mail con tu pedido.</p>
    </div>
    <div class="container">
        <img src="{{ asset('imgs/compra-exitosa-copy.jpg') }}" alt="Frutas en un bowl." class="img-fluid p-4">
    </div>
</div>
@endsection
