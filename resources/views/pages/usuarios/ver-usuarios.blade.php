@extends('adminlte::page')

@section('title', 'Usuarios')

@section('content_header')
    <h1>Administrar Usuarios</h1>
@stop

@section('content')

    <hr class="mt-2">



    @isset($roles_user)


        @if (in_array('Administrador', $roles_user))

            {{-- Mostrar Alerta una vez eliminado el usuario --}}
            @if (session('status'))
                <script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Usuario Eliminado Correctamente',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                </script>
            @endif

            {{-- Mostrar Alerta de Error en dado caso que se intente eliminar el usuario autenticado --}}
            @if (session('error-user'))
                <script>
                    Swal.fire({
                        icon: 'error',
                        title: 'Error al Eliminar el Usuario',
                        text: 'No puede Eliminarse a si mismo',
                    })

                </script>
            @endif

            <x-breadcrumb-adminlte current-route="Administrar Usuarios" />
            <div class="d-flex justify-content-start my-3">
                <a href="{{ route('user.create') }}" class="btn btn-primary btn-lg">Crear Nuevo Usuario <i
                        class="fas fa-user-plus mx-1"></i></a>
            </div>
            <x-table-users :user-data="$users" />
        @else
            <x-not-permission></x-not-permission>
        @endif


    @endisset
@stop

@section('footer')
    <x-footer-adminlte></x-footer-adminlte>
@stop

@section('css')


@stop

@section('js')
@stop
