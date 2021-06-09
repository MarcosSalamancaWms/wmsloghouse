<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    protected $fillable = [
        "photo_url"
    ];

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
