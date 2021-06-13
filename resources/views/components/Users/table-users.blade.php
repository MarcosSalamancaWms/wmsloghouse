<table class="table">
    <thead class="thead-dark">
        <tr>
            <th scope="col">#</th>
            <th scope="col">Nombre</th>
            <th scope="col">Usuario</th>
            <th scope="col">Foto</th>
            <th scope="col">Perfil/Role</th>
            <th scope="col">Estado</th>
            <th scope="col">Último Inicio de Sesión</th>
            <th scope="col">Último Cierre de Sesión</th>
            <th scope="col">Acciones</th>
        </tr>
    </thead>
    <tbody>



        @foreach ($user_data as $user)
            <tr>
                <th scope="row">{{ $user->id }}</th>
                <td>{{ $user->profile->nombre }}</td>
                <td>{{ $user->username }}</td>
                <td>
                    <img src="{{ asset($user->profile->photo->photo_url) }}" height="40" width="40" alt="">
                </td>
                <td>
                    @foreach ($user->roles as $role)
                        <span>{{ $role->role_name }}, </span>
                    @endforeach
                </td>
                <td>
                    @if ($user->estado_id === 1)
                        <span class="badge badge-success">{{ $user->estado->estado }}</span>
                    @else
                        <span class="badge badge-danger">{{ $user->estado->estado }}</span>
                    @endif
                </td>
                <td>{{ $user->last_session_started }}</td>
                <td>{{ $user->last_session_completed }}</td>
                <td>
                    <a href="{{ route('user.edit', $user->slug) }}" class="btn btn-warning btn-md mx-2">
                        <i class="fas fa-user-edit text-white"></i>
                    </a>
                    <button class="btn btn-danger btn-md mx-2" onclick="msjConfirmDeleteUser('{{ $user->slug }}')">
                        <i class="fas fa-user-times text-white"></i>
                    </button>

                    <form action="{{ route('user.destroy', $user->slug) }}" method="POST"
                        id="form-delete-user-{{ $user->slug }}">
                        @csrf
                        @method('DELETE')
                    </form>
                </td>
            </tr>
        @endforeach



    </tbody>
</table>

<script>
    function msjConfirmDeleteUser(slug) {

        Swal.fire({
            title: '¿Estas Seguro de Eliminar a este Usuario?',
            text: "Esta acción no podrá ser revertida",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Aceptar'
        }).then((result) => {
            if (result.isConfirmed) {
                /* Si decide confimar la petición */

                document.getElementById(`form-delete-user-${slug}`).submit();

            }
        })
    }

</script>
