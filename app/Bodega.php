<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    protected $fillable = [
        "prefijo", "bodega"
    ];
    public function profile()
    {
        return $this->hasOne('App\Profile');
    }
}
