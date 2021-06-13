<?php

namespace App\Http\Controllers;

use App\Photo;
use App\Profile;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class PerfilController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function load_profile_data(User $usuario)
    {

        if ($usuario->slug === Auth::user()->slug) {
            return view('pages.usuarios.perfil.perfil-user', compact('usuario'));
        } else {
            return redirect()->route('perfil-load-data', Auth::user()->slug);
        }
    }


    public function update_profile_data(Request $request)
    {
        $request->validate([
            "nombre" => ['required', 'string', 'min:5', 'max:40'],
            "username" => ['required', 'string', 'max:35', 'min:6'],
            "email" => ['required', 'string', 'email', 'max:255'],
            'password' => ['required', 'string', 'min:8'],
            "photo" => ['image']
        ]);
        $new_photo_url = '';
        $user_authenticated = User::find(Auth::user()->id);

        $user_authenticated->username = $request->username;
        $user_authenticated->password = Hash::make($request->password);

        /* Modificamos el Nombre del Perfil */
        $profile_object = Profile::find(Auth::user()->profile->id);
        $profile_object->nombre = $request->nombre;
        $profile_object->save();

        /* Guardamos la foto de perfil */

        if ($request->hasFile('photo')) {

            $name_save_img = time() . "_" . rand(50, 1000) . "_" . Str::random(15) . "_" . $request->file('photo')->getClientOriginalName();

            $new_photo_url = 'storage/perfil/' . $name_save_img;

            /* Eliminamos la foto de perfil anterior que tiene */

            /* Para acceder al Storage, tenemos que remplazar el storage/ por el public/
            ya que el storage/ se usa para acceder al storage desde la carpeta public, 
            y el public/ se usa cuando se quiere acceder al storage original */
            $ruta_storage_photo = str_replace("storage/", "public/", Auth::user()->profile->photo->photo_url);

            if (Auth::user()->profile->photo->photo_url != 'storage/perfil/defaults/avatar_user.svg') {
                if (Storage::exists($ruta_storage_photo)) {
                    Storage::delete($ruta_storage_photo);
                }
            }

            $request->file('photo')->storeAs('public/perfil', $name_save_img);
        } else {

            /* if (Auth::user()->profile->photo->photo_url != 'storage/perfil/defaults/avatar_user.svg') {
                if (Storage::exists('public/perfil/' . Auth::user()->profile->photo->photo_url)) {
                    Storage::exists(Auth::user()->profile->photo->photo_url);
                }
            } */

            $new_photo_url = Auth::user()->profile->photo->photo_url;
        }

        /* Guardamos la informacion ingresada por el usuario */
        $user_authenticated->save();
        /* Guardamos la url de la foto de perfil */

        $photo_object = Photo::find(Auth::user()->profile->photo->id);
        $photo_object->photo_url = $new_photo_url;
        $photo_object->save();

        return redirect()->route('perfil-load-data', Auth::user()->slug)->with('status', 'Datos de Perfil Actualizados Correctamente');
    }
}
