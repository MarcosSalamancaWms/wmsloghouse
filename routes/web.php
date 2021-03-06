<?php

use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('Inicio');

Auth::routes([
    'register' => false,
    'reset' => false,
    'verify' => false,
    'confirm' => false

]);

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/usuarios', 'UsuariosController')->names('user');

Route::get('/perfil/{usuario}', 'PerfilController@load_profile_data')->name('perfil-load-data');
Route::post('/perfil', 'PerfilController@update_profile_data')->name('update-data-profile');

/*Para crear el Storage Link en Modo Produccion en Hosting Compartido*/
Route::get('make-storage-link', function () {
    Artisan::call('storage:link');

    return view('production.storage-successs');
});
