<?php

namespace App\Http\Controllers;

use App\Bodega;
use App\Estado;
use App\Http\Requests\CreateUserRequest;
use App\Photo;
use App\Profile;
use App\Role;
use App\Rules\UniqueUpdateUser;
use App\User;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;


class UsuariosController extends Controller
{


    public $roles_user;
    public function __construct()
    {
        $this->middleware('auth');
        $this->roles_user = [];
    }

    public function index()
    {

        /* Verificar los datos del Usuario Autenticado */
        $user_authenticated = Auth::user();


        foreach ($user_authenticated->roles as $role) {
            array_push($this->roles_user, $role->role_name);
        }

        /* Obtener los roles de este usuario para evaluar si tiene acceso a ver todos los usuarios del sistema */
        $roles_user = $this->roles_user;
        /* Obtener todos los usuarios para mostrarlos y paginados */

        $users = User::paginate(15);

        return view('pages.usuarios.ver-usuarios', compact('users', 'roles_user'));
    }

    public function create()
    {
        $user_authenticated = Auth::user();

        $bodegas = Bodega::all();

        foreach ($user_authenticated->roles as $role) {
            array_push($this->roles_user, $role->role_name);
        }

        $roles_user = $this->roles_user;

        $roles = Role::all();


        return view('pages.usuarios.crear-usuarios', compact('roles_user', 'roles', 'bodegas'));
    }

    public function store(CreateUserRequest $request)
    {
        /* Nombre del Form Request para las validaciones */
        /* CreateUserRequest */
        /* Capturar los roles escojidos y guardarlos en un arreglo */
        $roles_add_user = [];

        if ($request->has('Administrador')) {
            array_push($roles_add_user, $request->input('Administrador'));
        }
        if ($request->has('Vendedor')) {
            array_push($roles_add_user, $request->input('Vendedor'));
        }
        if ($request->has('OperadordePiso')) {
            array_push($roles_add_user, $request->input('OperadordePiso'));
        }

        if ($request->has('Administrativo')) {
            array_push($roles_add_user, $request->input('Administrativo'));
        }
        if ($request->has('Supervisor')) {
            array_push($roles_add_user, $request->input('Supervisor'));
        }


        $photo_user_default = Photo::create([]);

        $user_profile = Profile::create([
            'photo_id' => $photo_user_default->id,
            'documento' => $request->documento,
            'nombre' => $request->nombre,
            'bodega_id' => $request->bodega,
        ]);

        $new_user_wms = User::create([
            'username' => $request->username,
            'slug' => Str::random(20),
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'profile_id' => $user_profile->id,
            'estado_id' => 1,
            'last_session' => null
        ]);

        $new_user_wms->roles()->sync($roles_add_user);


        return redirect()->route('user.index')->with('status', 'Usuario Registrado Correctamente');
    }

    public function show(User $usuario)
    {
        //
    }

    public function edit(User $usuario)
    {

        $bodegas = Bodega::all();

        $estados = Estado::all();
        /* Obtener los roles del usuario autenticado para ver si tiene permiso */
        $user_authenticated = Auth::user();

        foreach ($user_authenticated->roles as $role) {
            array_push($this->roles_user, $role->role_name);
        }

        $roles_user = $this->roles_user;

        $roles = Role::all();

        /* Obtener los roles del usuario que queremos modificar y guardarlos en un arreglo */
        $roles_user_for_update = [];

        foreach ($usuario->roles as $role_user) {
            array_push($roles_user_for_update, $role_user->role_name);
        }

        return view('pages.usuarios.editar-usuarios', compact('usuario', 'roles_user', 'roles', 'bodegas', 'roles_user_for_update', 'estados'));
    }

    public function update(Request $request, User $usuario)
    {

        $request->validate([
            "nombre" => ['required', 'string', 'min:5', 'max:40'],
            "documento" => ['required', 'string', 'max:30'],
            "bodega" => ['required'],
            "username" => ['required', 'string', 'max:35', 'min:6'],
            'password' => ['required', 'string', 'min:8'],
            "email" => [
                'required', 'string', 'email', 'max:255',
                Rule::unique('users')->ignore($usuario),
            ],
            /* 'password' => ['required', 'string', 'min:8'], */
        ]);

        $profile_user = Profile::find($usuario->id);
        $profile_user->nombre = $request->nombre;
        $profile_user->documento = $request->documento;
        $profile_user->bodega_id = $request->bodega;
        $profile_user->save();

        $usuario->username = $request->username;
        $usuario->email = $request->email;
        /* Modificamos el estado del usuario */
        $usuario->password = Hash::make($request->password);
        $usuario->estado_id = $request->estado;

        $usuario->save();

        /* Capturar nuevos roles */
        $roles_add_user = [];

        if ($request->has('Administrador')) {
            array_push($roles_add_user, $request->input('Administrador'));
        }
        if ($request->has('Vendedor')) {
            array_push($roles_add_user, $request->input('Vendedor'));
        }
        if ($request->has('OperadordePiso')) {
            array_push($roles_add_user, $request->input('OperadordePiso'));
        }

        if ($request->has('Administrativo')) {
            array_push($roles_add_user, $request->input('Administrativo'));
        }
        if ($request->has('Supervisor')) {
            array_push($roles_add_user, $request->input('Supervisor'));
        }

        $usuario->roles()->sync($roles_add_user);

        return redirect()->route('user.edit', $usuario->slug)->with('status', 'Cambios Registrados Correctamente');
    }

    public function destroy(User $usuario)
    {
        if ($usuario->slug === Auth::user()->slug) {

            return redirect()->route('user.index')->with('error-user', 'No te puedes eliminar a ti mismo');
        } else {


            /* Eliminamos la Foto de Perfil siempre y cuando no coincida con la imagen por defecto que se le 
            asigna a todos los perfiles cuando apenas son creados. */
            $ruta_storage_photo = str_replace("storage/", "public/", $usuario->profile->photo->photo_url);

            if ($usuario->profile->photo->photo_url != 'storage/perfil/defaults/avatar_user.svg') {
                if (Storage::exists($ruta_storage_photo)) {
                    Storage::delete($ruta_storage_photo);
                }
            }

            /* Procedemos a eliminar los registros de este usuario */

            $photo_id = Photo::find($usuario->profile->photo_id);

            $photo_id = Profile::find($usuario->profile->id)->photo_id;
            Profile::find($usuario->profile_id)->delete();

            Photo::find($photo_id)->delete();

            return redirect()->route('user.index')->with('status', 'Usuario Eliminado Correctamente');
        }
    }
}
