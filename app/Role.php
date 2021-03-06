<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $fillable = [
        "role"
    ];

    /* public function user()
    {
        return $this->hasOne("App\User");
    } */

    public function users()
    {
        return $this->belongsToMany("App\User");
    }
}
