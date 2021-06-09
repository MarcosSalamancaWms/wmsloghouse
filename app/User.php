<?php

namespace App;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function state()
    {
        return $this->belongsTo('App\Estado');
    }

    /* public function role()
    {
        return $this->belongsTo('App\Role');
    } */
    public function roles()
    {
        return $this->belongsToMany('App\Role');
    }

    public function profile()
    {
        return $this->belongsTo('App\Profile');
    }

    public function add_profile($profile_data)
    {
        if (is_array($profile_data)) {
            return Profile::create($profile_data);
        } else {
            return "Error!, tiene que mandar un arreglo con los datos";
        }
    }

    public function add_photo($url)
    {
        if (is_string($url)) {
            return Photo::create();
        } else {
            return "Favor de pasar la Url de la Photo en formato String";
        }
    }

    /* AdminLTE Functions */
    public function adminlte_image()
    {
        /* Consultar en el Storage */
        /* return Photo::find(Profile::find(Auth::user()->profile_id)->photo_id)->photo_url; */
        return Auth::user()->profile->photo->photo_url;
    }

    public function adminlte_desc()
    {
        /* return Role::find(Auth::user()->role_id)->role; */
        return Auth::user()->roles[0]->role_name;
    }

    public function adminlte_profile_url()
    {
        return 'profile/username/' . Auth::user()->id;
    }
}
