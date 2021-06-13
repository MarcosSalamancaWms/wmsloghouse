<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class CreateUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        $roles_user_authenticated = [];

        $user_authenticated = Auth::user();


        foreach ($user_authenticated->roles as $role) {
            array_push($roles_user_authenticated, $role->role_name);
        }

        $user_is_admin = in_array('Administrador', $roles_user_authenticated);

        return $user_is_admin;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            "nombre" => ['required', 'string', 'min:5', 'max:40'],
            "documento" => ['required', 'string', 'max:30'],
            "bodega" => ['required'],
            "username" => ['required', 'string', 'max:35', 'min:6', 'unique:users,username'],
            "email" => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
            /* "photo" => ['image', 'file', 'mimes:jpeg,bmp,png'] */

        ];
    }
    /* public function messages()
    {
        return [];
    } */
}
