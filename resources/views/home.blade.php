@extends('adminlte::page')

@section('title', 'Dashboard')

@section('content_header')
    <span class="h1">Tablero</span> <span class="ml-2 h6">Panel de Control</span>
@stop

@section('content')
    <x-breadcrumb-adminlte current-route="Tablero" />

    <div class="container-fluid">
        <div class="row">
            <x-small-boxs-adminlte.ventas venta-total="19,588" />
            <x-small-boxs-adminlte.categorias numero-categorias="150" />
            <x-small-boxs-adminlte.clientes numero-clientes="13" />
            <x-small-boxs-adminlte.productos numero-productos="5,524" />
        </div>


    </div>

    <div style="height: 1200px;">
        <p>Welcome to this beautiful admin panel.</p>

    @stop

    @section('footer')
        <x-footer-adminlte></x-footer-adminlte>
    @stop

    @section('css')
        <link rel="stylesheet" href="/css/admin_custom.css">

    @stop

    @section('js')
    @stop
