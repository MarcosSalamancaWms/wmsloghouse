@if ($errors->any())
    <script>
        Swal.fire({
            icon: 'error',
            title: 'Error al Procesar el Registro',
            text: 'Favor de verificar que los datos cumplan con los requerimientos',
        })

    </script>
    <div class="container shadow ronded border">
        <p class="text-center h3 font-weight-bold shadow p-3">Corregir los Siguientes Errores:</p>
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger" role="alert">
                <strong>{{ $error }}</strong>
            </div>
        @endforeach
    </div>
@endif
