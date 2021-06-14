{{-- Componente para Mostrar el mensaje de validacion --}}
<!-- Modal Cuenta Baneada-->

@if (!is_null(Auth::user()))


    @if (Auth::user()->estado_id === 2)
        <form action="{{ route('logout') }}" method="POST" class="d-none" id="form-logout-by-account-block">
            @csrf
        </form>

        <script>
            Swal.fire({
                allowEscapeKey: false,
                allowEnterKey: false,
                stopKeydownPropagation: false,
                allowOutsideClick: false,
                width: '90%',
                icon: 'error',
                title: '¡Cuenta Bloqueda!',
                text: 'Tu Cuenta ha sido Desactivada. Pongase en contacto con el administrador para más información.',
                confirmButtonText: `Aceptar`,
            }).then((result) => {
                /* Read more about isConfirmed, isDenied below */
                if (result.isConfirmed) {
                    document.getElementById('form-logout-by-account-block').submit();
                }
            })

        </script>
    @else
        <section>
            {{ $slot }}
        </section>

    @endif
@else
    <section>
        {{ $slot }}
    </section>
@endif
