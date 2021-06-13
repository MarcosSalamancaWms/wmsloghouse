<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $fillable = [
        "photo_id",
        'documento',
        'nombre',
        "bodega_id",
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

    public function bodega()
    {
        return $this->belongsTo('App\Bodega');
    }
}
