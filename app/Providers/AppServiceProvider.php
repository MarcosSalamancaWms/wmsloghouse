<?php

namespace App\Providers;

use App\View\Components\AccountBlock;
use App\View\Components\BodegasComponent;
use App\View\Components\ErrorsValidate;
use App\View\Components\inputGroupForm;
use App\View\Components\NotPermission;
use App\View\Components\main\breadcrumbAdminlte;
use App\View\Components\main\Footer;
use App\View\Components\main\FooterAdminlte;
use App\View\Components\main\Navbar;
use App\View\Components\smallBoxsAdminlte\Categorias;
use App\View\Components\smallBoxsAdminlte\Clientes;
use App\View\Components\smallBoxsAdminlte\Productos;
use App\View\Components\smallBoxsAdminlte\Ventas;
use App\View\Components\Users\TableUsers;
use Illuminate\Support\ServiceProvider;

/* Importamos la Facade de Blade para registrar a los componentes */
use Illuminate\Support\Facades\Blade;

class AppServiceProvider extends ServiceProvider
{
    public function register()
    {
    }

    public function boot()
    {
        //Registro de Componentes de Laravel Blade

        /* Componentes del Tablero */
        Blade::component('small-boxs-categorias', Categorias::class);
        Blade::component('small-boxs-clientes', Clientes::class);
        Blade::component('small-boxs-productos', Productos::class);
        Blade::component('small-boxs-ventas', Ventas::class);

        /* Componentes principales de la aplicacion */
        Blade::component('breadcrumb-adminlte', breadcrumbAdminlte::class);
        Blade::component('footer', Footer::class);
        Blade::component('footer-adminlte', FooterAdminlte::class);
        Blade::component('navbar', Navbar::class);

        /* Componentes para el usuario */

        Blade::component('table-users', TableUsers::class);

        /* Componentes para el tema de falta de permiso o baneo de cuenta o algo que tenga que ver con 
        la prohibición de alguna accion */
        Blade::component('account-block', AccountBlock::class);
        Blade::component('not-permission', NotPermission::class);

        /* componentes de formularios */
        Blade::component('errors-validate', ErrorsValidate::class);
        Blade::component('input-group-form', inputGroupForm::class);

        /* componente para mostrar las bodegas */

        Blade::component('bodegas', BodegasComponent::class);
    }
}
