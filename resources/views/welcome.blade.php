<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="{{ asset('img/logo-empresa.png') }}">
    <title>Laravel</title>
    <link rel="stylesheet" href="{{ mix('css/app.css') }}">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Roboto:100,300,400,500,700,900" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/@mdi/font@5.x/css/materialdesignicons.min.css" rel="stylesheet">
</head>

<style>
    #app {
        background-image: url('{{ asset('img/back.png') }}');
        background-size: cover;
    }

    .navbar#menu,
    footer {
        box-shadow: 0 2px 4px -1px rgb(0 0 0 / 20%), 0 4px 5px 0 rgb(0 0 0 / 14%), 0 1px 10px 0 rgb(0 0 0 / 12%);
    }

</style>

<body>
    <div id="app">
        <x-navbar color="dark" name-app="{{ config('app.name') }}" />

        <div class="container-fluid" style="height: 87vh !important;">
            <div class="d-flex justify-content-center align-items-center" style="height: 100%">
                <span>
                    <p class=" text-center display-4 font-weight-bold">{{ config('app.name') }}</p>
                    <p class="text-center h4 font-weight-bold">Sistema de Inventario y Venta</p>
                    <div class="d-flex justify-content-center mt-3">
                        @auth

                            <a href="{{ route('home') }}" class="btn btn-dark text-white btn-lg rounded font-weight-bold">
                                Ir a Inicio
                            </a>

                        @else
                            <a href="{{ route('login') }}"
                                class="btn btn-dark text-white btn-lg rounded font-weight-bold">
                                Iniciar Sesión
                            </a>
                        @endauth

                    </div>
                </span>
            </div>
        </div>

        <x-footer />

    </div>

    <script src="{{ mix('js/app.js') }}"></script>
</body>

</html>
