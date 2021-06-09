<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $user_authenticated = Auth::user();


        foreach ($user_authenticated->roles as $role) {
            array_push($this->roles_user, $role->role_name);
        }

        $roles_user = $this->roles_user;

        return view('pages.usuarios.ver-usuarios', compact('user_authenticated', 'roles_user'));
    }

    public function create()
    {
    }

    public function store(Request $request)
    {
    }

    public function show(UsuariosController $usuario)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
