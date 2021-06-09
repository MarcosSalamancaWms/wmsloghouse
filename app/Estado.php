<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Estado extends Model
{
    protected $fillable = [
        "estado",
        "last_session"
    ];

    public function user()
    {
        $this->hasOne('App\User');
    }
}
