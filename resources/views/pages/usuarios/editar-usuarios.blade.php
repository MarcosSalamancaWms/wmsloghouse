@extends('adminlte::page')

@section('title', 'Editar Usuario')

@section('content_header')
    <h1>Editar al Usuario: <span class="h3">{{ $usuario->username }}</span></h1>
@stop

@section('content')
    @isset($roles_user)
        @if (in_array('Administrador', $roles_user))
            <x-breadcrumb-adminlte current-route="Editar Usuario" />
            <x-errors-validate></x-errors-validate>
            @if (session('status'))
                <script>
                    Swal.fire({
                        position: 'top-end',
                        icon: 'success',
                        title: 'Datos Actualizados Correctamente',
                        showConfirmButton: false,
                        timer: 2000
                    })
                    setTimeout(function() {
                        location.reload();
                    }, 2000);

                </script>
            @endif


            <div class="container">
                <form action="{{ route('user.update', $usuario->slug) }}" class="mt-3" method="POST"
                    id="form-update-data-user">
                    @csrf
                    @method('PUT')


                    <p class="h4 font-weight-bold">Datos del Usuario</p>
                    <div class="row">
                        <div class="col-12 col-lg-6">
                            <x-input-group-form reference-input="nombre" text="Nombre Completo"
                                placeholder="Escribe el nuevo Nombre Completo" class-icon="fas fa-user-circle" type="text"
                                value="{{ old('nombre', $usuario->profile->nombre) }}">
                            </x-input-group-form>
                        </div>
                        <div class="col-12 col-lg-3">
                            <x-input-group-form reference-input="documento" text="Documento"
                                placeholder="Escribe el nuevo Documento" class-icon="fas fa-file-alt" type="text"
                                value="{{ old('documento', $usuario->profile->documento) }}">
                            </x-input-group-form>
                        </div>
                        <div class="col-12 col-lg-3">
                            <div class="form-group">
                                <label for="inputState">Asignar Nueva Bodega:</label>
                                <select id="bodega" class="form-control border shadow rounded my-2" name="bodega">
                                    @foreach ($bodegas as $bodega)
                                        <option @if ($usuario->profile->bodega->id === $bodega->id) selected @endif value="{{ $bodega->id }}">
                                            {{ $bodega->bodega }}</option>
                                    @endforeach
                                </select>
                            </div>

                        </div>
                    </div>
                    <hr>
                    <p class="h4 font-weight-bold">Datos de Acceso</p>
                    <div class="row">
                        <div class="col-12 col-md-7 col-lg-4">
                            <x-input-group-form reference-input="username" text="Nombre de Usuario"
                                placeholder="Escribe el nuevo Nombre de Usuario" class-icon="fas fa-user" type="text"
                                value="{{ old('username', $usuario->username) }}">
                            </x-input-group-form>
                        </div>
                        <div class="col-12 col-md-5 col-lg-4">
                            <x-input-group-form reference-input="email" text="Correo Electronico"
                                placeholder="Escribe el nuevo Correo Electronico" class-icon="fas fa-envelope" type="text"
                                value="{{ old('email', $usuario->email) }}">
                            </x-input-group-form>
                        </div>

                        <div class="col-12 col-md-12 col-lg-4">
                            <x-input-group-form reference-input="password" text="Contraseña"
                                placeholder="Escribe la nueva Contraseña" class-icon="fas fa-lock" type="password"
                                value="{{ old('password') }}">
                            </x-input-group-form>
                        </div>
                    </div>


                    <hr>


                    <div class="row my-4">
                        <div class="col-12 col-lg-12">
                            <p class="h4 font-weight-bold mb-3">Selecciona los Nuevos Roles del Usuario</p>
                            @foreach ($roles as $role)
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input"
                                        id="{{ str_replace(' ', '', $role->role_name) }}"
                                        name="{{ str_replace(' ', '', $role->role_name) }}" value="{{ $role->id }}">
                                    <label class="custom-control-label"
                                        for="{{ str_replace(' ', '', $role->role_name) }}">{{ str_replace(' ', '', $role->role_name) }}</label>
                                </div>
                            @endforeach
                        </div>
                    </div>

                    <hr>
                    {{-- <div class="row my-4">
                        <div class="col-12">
                            <p class="h4 font-weight-bold mb-3">Subir una Foto de Perfil</p>
                            <div class="custom-file shadow rounded">
                                <input type="file" class="custom-file-input" id="photo" lang="es" name="photo">
                                <label class="custom-file-label" for="photo">Selecciona la imagen <span class="text-info">Peso
                                        Máximo de
                                        5MB</span></label>
                                <small id="helpId" class="form-text text-muted">Peso de la Imagen: </small>
                            </div>
                        </div>
                    </div> --}}
                    <div class="row">
                        <div class="col-12">
                            <div class="d-flex justify-content-center">
                                <small class="text-info">* La imagen/foto de perfil, solamente podrá ser modificado por el
                                    usuario *</small>
                            </div>
                        </div>
                    </div>


                    <div class="row my-5">
                        <div class="col-12 d-flex justify-content-center">
                            <div class="mx-auto w-50">
                                <button type="submit" class="btn btn-primary btn-block shadow rounded font-weight-bold"
                                    id="btn-enviar-data-for-update-user">Guardar
                                    Cambios</button>
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

@stop

@section('js')
    <script>
        document.getElementById('btn-enviar-data-for-update-user').addEventListener('click', function(e) {
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
                document.getElementById('form-update-data-user').submit();
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
