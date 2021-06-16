@extends('adminlte::page')

@section('title', 'Comando Artisan Ejecutado')

@section('content_header')
    <h1>Comando Artisan Ejecutado Correctamente | {{ config('app.name') }}</h1>
@stop

@section('content')
    <p class="text-center mt-5 h2 bg-success p-3">Link Simbolico del Storage creado correctamente en modo Producción</p>
    <p class="mt-4 text-info h4 text-center">* Por favor abandona esta pagina y consulta con el administrador el permiso en
        modo de
        produccion de consultar esta vista *</p>

    <div class="mt-5 w-25 mx-auto">
        <a href="{{ route('home') }}" class="btn btn-success d-block mx-auto shadow rounded p-2">Ir a Inicio</a>
    </div>
@stop
