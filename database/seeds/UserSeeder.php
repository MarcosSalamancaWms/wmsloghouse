<?php

use App\Estado;
use App\Photo;
use App\Profile;
use App\Role;
use App\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /* User::truncate(); */

        $Roles = [
            "Administrador",
            "Vendedor",
            "Operador de Piso",
            "Administrativo",
            "Supervisor"
        ];

        $Photo = Photo::create([
            "photo_url" => 'https://picsum.photos/300/300'
        ]);

        $Profile = Profile::create([
            "photo_id" => $Photo->id,
            "documento" => '12312312',
            "nombre" => 'Moheno Zavaleta Raul Alberto',
            "perfil" => 'Administrador',
            "bodega" => "AV Sexta"
        ]);

        Estado::create([
            'estado' => 'Activado',
        ]);

        Estado::create([
            'estado' => 'Desactivado',
        ]);

        foreach ($Roles as $Role) {
            Role::create([
                'role_name' => $Role
            ]);
        }


        $user = User::create([
            'username' => 'Raul Moheno',
            'slug' => Str::random(20),
            'email' => 'ramz.162025@gmail.com',
            'password' => bcrypt('youtube3'),
            "profile_id" => $Profile->id,
            "estado_id" => 1,
            'last_session' => Carbon::now()
        ]);

        $user->roles()->sync([1, 4]);
    }
}
