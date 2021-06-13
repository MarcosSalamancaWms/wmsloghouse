@extends('adminlte::page')

@section('title', 'Nuevo Usuario')

@section('content_header')
    <h1>Crear Nuevo Usuario</h1>
@stop

@section('content')
    @isset($roles_user)
        @if (in_array('Administrador', $roles_user))
            <x-breadcrumb-adminlte current-route="Crear nuevo usuario" />


            <x-errors-validate></x-errors-validate>

            <div class="container">
                <form action="{{ route('user.store') }}" class="mt-3" method="POST" id="create-user-form-wms">
                    @csrf


                    <p class="h4 font-weight-bold">Datos del Usuario</p>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <x-input-group-form reference-input="nombre" text="Nombre Completo"
                                placeholder="Escribe el Nombre Completo" class-icon="fas fa-user-circle" type="text"
                                value="{{ old('nombre') }}">
                            </x-input-group-form>
                        </div>
                        <div class="col-12 col-lg-3">
                            <x-input-group-form reference-input="documento" text="Documento" placeholder="Escribe el Documento"
                                class-icon="fas fa-file-alt" type="text" value="{{ old('documento') }}">
                            </x-input-group-form>
                        </div>
                        <div class="col-12 col-lg-3">
                            <x-bodegas-component text="Selecciona la Bodega" reference="bodega" :bodegas="$bodegas">
                            </x-bodegas-component>
                        </div>
                    </div>
                    <hr>
                    <p class="h4 font-weight-bold">Datos de Acceso</p>
                    <div class="row">
                        <div class="col-12 col-md-7 col-lg-4">
                            <x-input-group-form reference-input="username" text="Nombre de Usuario"
                                placeholder="Escribe el Nombre de Usuario" class-icon="fas fa-user" type="text"
                                value="{{ old('username') }}">
                            </x-input-group-form>
                        </div>
                        <div class="col-12 col-md-5 col-lg-4">
                            <x-input-group-form reference-input="email" text="Correo Electronico"
                                placeholder="Escribe el Correo Electronico" class-icon="fas fa-envelope" type="text"
                                value="{{ old('email') }}">
                            </x-input-group-form>
                        </div>

                        <div class="col-12 col-md-12 col-lg-4">
                            <x-input-group-form reference-input="password" text="Contraseña" placeholder="Escribe la Contraseña"
                                class-icon="fas fa-lock" type="password" value="{{ old('password') }}">
                            </x-input-group-form>
                        </div>
                    </div>


                    <hr>
                    <div class="row my-4">
                        <div class="col-12 col-lg-12">
                            <p class="h4 font-weight-bold mb-3">Selecciona los Roles del Usuario</p>
                            @foreach ($roles as $role)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                        id="{{ str_replace(' ', '', $role->role_name) }}"
                                        name="{{ str_replace(' ', '', $role->role_name) }}" value="{{ $role->id }}">
                                    <label class="custom-control-label"
                                        for="{{ str_replace(' ', '', $role->role_name) }}">{{ $role->role_name }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <hr>


                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <small class="text-info">* La imagen/foto de perfil, solamente podrá ser asignado por el
                                    usuario *</small>
                            </div>
                        </div>
                    </div>

                    <div class="row my-5">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="mx-auto w-50">
                                <button class="btn btn-primary btn-block shadow rounded font-weight-bold"
                                    id="btn-enviar-data-for-create-user">Registrar</button>
                            </div>
                        </div>
                    </div>



                </form>
            </div>

        @else
            <x-not-permission></x-not-permission>
        @endif
    @endisset

@stop


@section('footer')
    <x-footer-adminlte></x-footer-adminlte>
@stop

@section('css')
    <link rel='stylesheet' href='/css/admin_custom.css'>

@stop

@section('js')
    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        document.getElementById('btn-enviar-data-for-create-user').addEventListener('click', function(e) {
            e.preventDefault();

            let roles = [
                "Administrador",
                "Vendedor",
                "OperadordePiso",
                "Administrativo",
                "Supervisor"
            ];

            let result_one_role = false;

            roles.forEach(rol_refence => {

                if (document.getElementById(rol_refence).checked) {
                    result_one_role = true;
                }

            });

            if (result_one_role === true) {
                document.getElementById('create-user-form-wms').submit();
            } else {
                Swal.fire({
                    icon: 'error',
                    title: 'Selecciona un rol...',
                    text: 'Por favor Selecciona al menos un rol o perfil para el usuario',
                })
            }
        });

    </script>
@stop
