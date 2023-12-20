<?php
use Illuminate\Database\Eloquent\Collection;
?>

@extends('layouts.main')

@section('title', 'Compra fallida')

@section('content')
<div class="container p-4">
    <h1 class="text-danger mb-4">Compra fallida</h1>
    <p>Hubo un problema y tu compra no se generó. Intentá en unos instantes nuevamente.</p>
    <p>Si el problema persiste te recomendamos que intentes con otro medio de pago si es posible.</p>
</div>
@endsection
