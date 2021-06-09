@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Administrar Usuarios</h1>
@stop

@section('content')

    <hr class="mt-2">

    @isset($user_authenticated)

        @if (in_array('Administrativo', $roles_user))
            <p>SI esta</p>
        @else
            <p>No esta</p>
        @endif


    @endisset
@stop

@section('footer')
    <x-footer-adminlte></x-footer-adminlte>
@stop

@section('css')
    <link rel='stylesheet' href='/css/admin_custom.css'>
@stop

{{-- @section('js')
    <script>
        console.log('Hi!');

    </script>
@stop --}}
