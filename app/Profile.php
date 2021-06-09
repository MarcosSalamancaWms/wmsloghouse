<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        'documento',
        'nombre',
        "Usuario",
        "perfil",
    ];

    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function photo()
    {
        return $this->belongsTo(Photo::class);
    }

    public function add_user($user_data)
    {
        return User::create($user_data);
    }
}
