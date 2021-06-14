@extends('adminlte::page')

@section('title', 'Mi Perfil')

@section('content_header')
    <h1>Datos de mi Perfil</h1>
@stop

@section('content')
    <x-breadcrumb-adminlte current-route="Perfil" />

    @if (session('status'))
        <script>
            Swal.fire({
                position: 'top-end',
                icon: 'success',
                title: 'Datos de Perfil Actualizados Correctamente',
                showConfirmButton: false,
                timer: 2000
            })
            setTimeout(function() {
                location.reload();
            }, 2000);

        </script>
    @endif

    <div class="container p-2 border shadow rounded">
        <div id="box-btn-edit-perfil" title="Boton para Modificar Perfil">
            <button class="btn btn-info btn-md font-weight-bold m-2" id="btn-active-modal-for-edit-perfil">Editar Datos de
                mi Perfil</button>
        </div>

        <section class="row">
            <div class="col-12">
                <div class="d-flex justify-content-center" id="show-perfil-data">
                    <img src="{{ asset($usuario->profile->photo->photo_url) }}" height="150" width="150"
                        alt="Imagen de Perfil - {{ $usuario->profile->nombre }}">
                </div>
                {{-- Formulario de Visualizacion de datos del perfil --}}
                <hr>
                <div class="row my-3">
                    <div class="col-12">
                        <label class="font-weight-bold" for="nombre">Nombre Completo:</label>
                        <div class="input-group my-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control shadow rounded" id="nombre_data" name="nombre_data"
                                placeholder="" value="{{ $usuario->profile->nombre }}" disabled>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-12">
                        <label class="font-weight-bold" for="documento">Documento:</label>
                        <div class="input-group my-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-file-alt"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control shadow rounded" id="documento_data" name="documento_data"
                                placeholder="" value="{{ $usuario->profile->documento }}" disabled>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-12">
                        <label class="font-weight-bold" for="bodega">Bodega:</label>
                        <div class="input-group my-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-archive"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control shadow rounded" id="bodega_data" name="bodega_data"
                                placeholder="" value="{{ $usuario->profile->bodega->bodega }}" disabled>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-12">
                        <label class="font-weight-bold" for="username">Nombre de usuario:</label>
                        <div class="input-group my-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-user"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control shadow rounded" id="username_data" name="username_data"
                                placeholder="" value="{{ $usuario->username }}" disabled>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-12">
                        <label class="font-weight-bold" for="email">Correo Electronico:</label>
                        <div class="input-group my-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-envelope"></i>
                                </div>
                            </div>
                            <input type="text" class="form-control shadow rounded" id="email_data" name="email_data"
                                placeholder="" value="{{ $usuario->email }}" disabled>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row my-3">
                    <div class="col-12">
                        <label class="font-weight-bold" for="password">Password:</label>
                        <div class="input-group my-2 mr-sm-2">
                            <div class="input-group-prepend">
                                <div class="input-group-text">
                                    <i class="fas fa-lock"></i>
                                </div>
                            </div>
                            <input type="password" class="form-control shadow rounded" id="password_data"
                                name="password_data" placeholder="" value="{{ $usuario->password }}" disabled>
                        </div>
                    </div>
                </div>

                <hr>
                <div class="row my-3">
                    <div class="col-12">
                        <span class="h5 font-weight-bold mx-1">Estado:</span>
                        @if ($usuario->estado_id === 1)
                            <span class="badge badge-success">{{ $usuario->estado->estado }}</span>
                        @else
                            <span class="badge badge-danger">{{ $usuario->estado->estado }}</span>
                        @endif
                    </div>
                </div>

            </div>
        </section>
    </div>



    {{-- Formulario para editar el Perfil --}}



    <!-- Modal -->
    <div class="modal fade" id="form-update-data-perfil" tabindex="-1" role="dialog"
        aria-labelledby="form-update-data-perfil" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="form">
            <div class="modal-content">
                <div class="modal-header bg-info p-3">
                    <h5 class="modal-title ">Editar Datos de Perfil</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">

                    <section class="container-fluid">
                        <x-errors-validate></x-errors-validate>
                        {{-- Formulario de actualizacion de datos de Perfil --}}
                        <form action="{{ route('update-data-profile') }}" method="POST" id="form-update-data-perfil-wms"
                            enctype="multipart/form-data">
                            @csrf
                            <div id="box-img-preview">
                                <div class="d-flex justify-content-center" id="show-perfil-data">
                                    <img src="{{ asset($usuario->profile->photo->photo_url) }}" height="100" width="100"
                                        alt="Imagen de Perfil - {{ $usuario->profile->nombre }}">
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-12">
                                    <p class="text-muted text-center font-weight-bold mb-3">Cambiar Foto de Perfil
                                        (Opcional)</p>
                                    <div class="custom-file shadow rounded">
                                        <input type="file" class="custom-file-input" id="photo" lang="es" name="photo"
                                            accept="image/jpeg, image/png">
                                        <label class="custom-file-label" for="photo">Selecciona la imagen</label>
                                        <small id="helpId" class="form-text text-muted">Por favor, subir en formato png o
                                            jpeg
                                        </small>
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row my-3">
                                <div class="col-12">
                                    <label class="font-weight-bold" for="nombre">Nombre Completo:</label>
                                    <div class="input-group my-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user-circle"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control shadow rounded" id="nombre" name="nombre"
                                            placeholder="Escribe el Nuevo Nombre Completo"
                                            value="{{ old('nombre', $usuario->profile->nombre) }}">
                                    </div>
                                </div>
                            </div>

                            {{-- <hr>
                            <div class="row my-3">
                                <div class="col-12">
                                    <label class="font-weight-bold" for="username">Nombre de usuario:</label>
                                    <div class="input-group my-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-user"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control shadow rounded" id="username" name="username"
                                            placeholder="Escribe el Nuevo Nombre de Usuario"
                                            value="{{ old('username', $usuario->username) }}">
                                    </div>
                                </div>
                            </div> --}}
                            <hr>
                            <div class="row my-3">
                                <div class="col-12">
                                    <label class="font-weight-bold" for="email">Correo Electronico:</label>
                                    <div class="input-group my-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-envelope"></i>
                                            </div>
                                        </div>
                                        <input type="text" class="form-control shadow rounded" id="email" name="email"
                                            placeholder="Escribe el Nuevo Correo Electronico"
                                            value="{{ old('email', $usuario->email) }}">
                                    </div>
                                </div>
                            </div>

                            <hr>
                            <div class="row my-3">
                                <div class="col-12">
                                    <label class="font-weight-bold" for="password">Password:</label>
                                    <div class="input-group my-2 mr-sm-2">
                                        <div class="input-group-prepend">
                                            <div class="input-group-text">
                                                <i class="fas fa-lock"></i>
                                            </div>
                                        </div>
                                        <input type="password" class="form-control shadow rounded" id="password"
                                            name="password" placeholder="Escribe la nueva contraseña" value="">
                                    </div>
                                </div>
                            </div>
                        </form>
                        {{-- Fin del Formulario de Actualizacion --}}
                    </section>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button type="button" class="btn btn-primary" id="btn-update-data-form-perfil">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        $('#exampleModal').on('show.bs.modal', event => {
            var button = $(event.relatedTarget);
            var modal = $(this);
            // Use above variables to manipulate the DOM

        });

    </script>


@stop

@section('css')
    <script src="https://code.jquery.com/jquery-3.6.0.slim.min.js"
        integrity="sha256-u7e5khyithlIdTpu22PHhENmPcRdFiHRjhAuHcs05RI=" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"
        integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
@stop

@section('js')



    <script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
    <script>
        $(document).ready(function() {
            bsCustomFileInput.init()
        })

        document.getElementById('btn-active-modal-for-edit-perfil').addEventListener('click', function() {
            $('#form-update-data-perfil').modal('show');
        });

        /* Verificar Informacion Registrada en el Formulario */
        document.getElementById('btn-update-data-form-perfil').addEventListener('click', function() {
            /* validaciones... */
            document.getElementById('form-update-data-perfil-wms').submit();
        });

        $('#photo').on('change', function(e) {
            let reader = new FileReader();
            reader.readAsDataURL(e.target.files[0]);
            reader.onload = function() {
                $('#box-img-preview').html(

                    `
                    <p class="text-center h4">Vista Previa de la Imagen</p>
                    <img src="${reader.result}" width="140" height="140" class="d-block mx-auto" />
                                                                                                                                        `
                );
            }
        });

    </script>
@stop
