<?php

use App\Bodega;
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


        $bodegas = array(
            array('prefijo' => 'admi', 'bodega' => 'Administrativo'),
            array('prefijo' => 'mer', 'bodega' => 'Mercadeo'),
            array('prefijo' => 'B6', 'bodega' => 'Av Sexta'),
            array('prefijo' => 'sal', 'bodega' => 'Salitre'),
            array('prefijo' => 'BQL', 'bodega' => 'Barranquilla'),
            array('prefijo' => 'Gfl', 'bodega' => 'Greenfield'),
            array('prefijo' => 'fsi', 'bodega' => 'san francisco'),
            array('prefijo' => 'ftb', 'bodega' => 'fontibon'),
            array('prefijo' => 'rs', 'bodega' => 'rosal'),
            array('prefijo' => 'JR', 'bodega' => 'Prueba JR 2')
        );





        $Photo1 = Photo::create([
            'photo_url' => 'storage/perfil/defaults/avatar_user.svg'
        ]);

        $Photo2 = Photo::create([
            'photo_url' => 'storage/perfil/defaults/avatar_user.svg'
        ]);

        foreach ($bodegas as $bodega) {
            Bodega::create([
                'prefijo' => $bodega["prefijo"],
                'bodega' => $bodega["bodega"]
            ]);
        }

        $Profile1 = Profile::create([
            "photo_id" => $Photo1->id,
            "documento" => '12312312',
            "nombre" => 'Moheno Zavaleta Raul Alberto',
            "bodega_id" => 2
        ]);

        $Profile2 = Profile::create([
            "photo_id" => $Photo2->id,
            "documento" => '9532323423',
            "nombre" => 'Marcos Salamanca',
            "bodega_id" => 3
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


        $user1 = User::create([
            'username' => 'Raul Moheno',
            'slug' => Str::random(20),
            'email' => 'ramz.162025@gmail.com',
            'password' => bcrypt('youtube3'),
            "profile_id" => $Profile1->id,
            "estado_id" => 1,
            /* 'last_session' => Carbon::now() */
        ]);

        $user2 = User::create([
            'username' => 'Marcos',
            'slug' => Str::random(20),
            'email' => 'marcos.salamanca@gmail.com',
            'password' => bcrypt('Marcos25'),
            "profile_id" => $Profile2->id,
            "estado_id" => 1,
            /* 'last_session' => Carbon::now() */
        ]);

        $user1->roles()->sync([1, 4]);
        $user2->roles()->sync([2, 3, 5]);
    }
}
