<?php



return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'title' => '',
    'title_prefix' => 'WMS Log-House |',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_ico_only' => true,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'logo' => '<b>WMS</b>Log-House',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'WMS Log-House',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-info',
    'usermenu_image' => true,
    'usermenu_desc' => false,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => true,
    'layout_dark_mode' => null,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => '',
    'classes_auth_header' => 'bg-gradient-info',
    'classes_auth_body' => '',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'fa-lg text-info',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => 'bg-info p-3 shadow rounded',
    'classes_content' => '',
    'classes_sidebar' => 'sidebar-dark-info elevation-4',
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-dark navbar-dark',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => 'lg',
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 400,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Basic-Configuration
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'password/reset',
    'password_email_url' => 'password/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => true,
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true,
        ],

        // Sidebar items:
        /* [
            'type' => 'sidebar-menu-search',
            'text' => 'search',
        ], */
        /* [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog',
        ], */
        [
            'text'        => 'Inicio',
            'route'         => 'home',
            'icon'        => 'fa fa-home',
            /* 'label'       => 4, */
            /* 'label_color' => 'success', */
        ],
        ['header' => 'Sistema - WMS Log-House'],
        [
            'text' => 'Usuarios',
            'route'  => 'user.index',
            'icon' => 'fas fa-fw fa-user',
        ],
        [
            'text'    => 'Configuración',
            'icon'    => 'fas fa-cogs',
            'submenu' => [
                [
                    'text' => 'Bodegas',
                    'icon_color' => 'info',
                    'url'  => '#',
                ],
                [
                    'text' => 'Ubicaciones de Almacen',
                    'icon_color' => 'info',
                    'url'  => '#',
                ],
                [
                    'text' => 'Zonas de Almacen',
                    'icon_color' => 'info',
                    'url'  => '#',
                ],
                [
                    'text' => 'Ubicaciones de Pick Cart',
                    'icon_color' => 'info',
                    'url'  => '#',
                ],
                [
                    'text' => 'Clientes',
                    'icon_color' => 'info',
                    'url'  => '#',
                ],
                [
                    'text' => 'Transportadoras',
                    'icon_color' => 'info',
                    'url'  => '#',
                ],
                [
                    'text' => 'Tiempos de Proceso',
                    'icon_color' => 'info',
                    'url'  => '#',
                ],
                [
                    'text' => 'Categorias',
                    'icon_color' => 'info',
                    'url'  => '#',
                ],

                /*  [
                    'text'    => 'level_one',
                    'url'     => '#',
                    'submenu' => [
                        [
                            'text' => 'level_two',
                            'url'  => '#',
                        ],
                        [
                            'text'    => 'level_two',
                            'url'     => '#',
                            'submenu' => [
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                                [
                                    'text' => 'level_three',
                                    'url'  => '#',
                                ],
                            ],
                        ],
                    ],
                ], */
            ],
        ],

        [
            'text' => 'Orden de Compras',
            'icon' => 'far fa-calendar-check',
            'submenu' => [
                [
                    'text' => 'Ordenes de Compra',
                    'icon' => 'fas fa-tasks',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Crear Orden de Compra',
                    'icon' => 'fas fa-clipboard-check',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
            ]
        ],


        [
            'text'       => 'Ingreso',
            'icon' => 'fas fa-check-double',
            'url'        => '#',
        ],
        [
            'text'       => 'Inventario',
            'icon' => 'fas fa-clipboard-list',
            'submenu' => [
                [
                    'text' => 'Stock General',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Stock Ubicacion',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Productos',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
            ]
        ],
        [
            'text'       => 'Kardex',
            'icon' => 'fas fa-exchange-alt',
            'url'        => '#',
        ],
        [
            'text'       => 'Ventas',
            'icon' => 'fas fa-donate',
            'submenu' => [
                [
                    'text' => 'Administrar Ventas',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Crear Venta',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Reporte de Ventas',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
            ]
        ],
        [
            'text'       => 'Asignación de Tareas',
            'icon' => 'fas fa-user-check',
            'url'        => '#',
        ],
        [
            'text'       => 'Picking',
            'icon' => 'fas fa-truck-pickup',
            'submenu' => [
                [
                    'text' => 'Picking Orden',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Picking Zona',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Picking Asignación',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Pedidos',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
            ]
        ],
        [
            'text'       => 'Ordenes de Servicio',
            'icon' => 'fas fa-house-user',
            'submenu' => [
                [
                    'text' => 'Orden de Servicio ',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Ordenes de Trabajo',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Agendas',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Productos',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Seguimiento',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Agenda Calendario',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Atención a Servicios',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Orden de Trabajo',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Estado de Facturación',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Factura',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Dashboard Servicio',
                    'icon_color' => 'info',
                    'url' => '#'
                ],

            ]
        ],
        [
            'text'       => 'Traslados',
            'icon' => 'fas fa-arrows-alt-h',
            'submenu' => [
                [
                    'text' => 'Traslado Bodegas',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Traslado Interno',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
                [
                    'text' => 'Cotizaciones',
                    'icon_color' => 'info',
                    'url' => '#'
                ],
            ]
        ],
        [
            'text' => 'Auditoría',
            'icon' => 'fas fa-eye',
            'url' => '#'
        ],
        [
            'text' => 'Embarque',
            'icon' => 'fas fa-dolly-flatbed',
            'url' => '#'
        ]

    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Plugins-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/Other-Configuration
    */

    'livewire' => false,
];
