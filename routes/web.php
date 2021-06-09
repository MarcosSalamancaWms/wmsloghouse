<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
})->name('Inicio');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::resource('/usuarios', 'UsuariosController')->names('user');
