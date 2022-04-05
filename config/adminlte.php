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

    'title' => 'Administrácia',
    'title_prefix' => '*',
    'title_postfix' => '| Farnosť Detva',

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

    'use_ico_only' => false,
    'use_full_favicon' => true,

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

    'logo' => '<b>Farnosť</b>Detva',
    'logo_img' => 'images/logo-farnost-detva.svg',
    'logo_img_dark' => 'images/logo-farnost-detva-tmave.svg',
    'logo_img_class' => 'brand-image',
    'logo_img_xl' => null,
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'Logo farnosti Detva',

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
    'usermenu_header_class' => 'bg-backend',
    'usermenu_image' => true,
    'usermenu_desc' => true,
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
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
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

    'classes_auth_card' => 'card-outline card-warning',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-warning',

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
    'classes_content_wrapper' => 'bg-backend',
    'classes_content_main' => 'pt-4',
    'classes_content_header' => '',
    'classes_content' => 'container-fluid',
    'classes_sidebar' => 'sidebar-dark-light elevation-4 lh-sm',
    'classes_sidebar_nav' => 'text-sm', // text-sm
    'classes_topnav' => 'navbar-gray navbar-dark',
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
    'sidebar_nav_animation_speed' => 300,

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
    'profile_url' => 'users.show',
    'dashboard_url' => '/',
    'logout_url' => 'logout',
    'logout_method' => 'POST',
    'login_url' => 'login',
    'register_url' => false,
    'password_reset_url' => false,
    'password_email_url' => 'password/email',

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
    'laravel_mix_css_path' => 'asset/backend/css/admin-app.css',
    'laravel_mix_js_path' => 'asset/backend/js/admin-app.js',

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
            'text'         => 'Hľadať ...',
            'topnav_right' => false,
        ],

        // Sidebar items:
        [
            'text'        => 'Dashboard',
            'icon_color'  => 'blue',
            'route'       => 'admin.dashboard',
            'icon'        => 'fab fa-fort-awesome fa-lg',
        ],

        [
            'header' => 'Oznamy',
            'can'  => [
                'notice-church.index',
                'notice-general.index',
                'notice-acolyte.index',
                'notice-lecturer.index',
            ],
        ],
                [
                    'text'  => 'Farské oznamy',
                    'icon_color'  => 'yellow',
                    'route' => 'notice-church.index',
                    'icon'  => 'fas fa-broadcast-tower',
                    'can'  => 'notice-church.index',
                ],
                [
                    'text'  => 'Rozpisy akolytov',
                    'icon_color'  => 'yellow',
                    'route' => 'notice-acolyte.index',
                    'icon'  => 'fas fa-hands-helping',
                    'can'  => 'notice-acolyte.index',
                ],
                [
                    'text'  => 'Rozpisy lektorov',
                    'icon_color'  => 'yellow',
                    'route' => 'notice-lecturer.index',
                    'icon'  => 'fas fa-book-open',
                    'can'  => 'notice-lecturer.index',
                ],
        [
            'header' => 'Sekcie',
            'can'  => [
                'news.index',
                'priests.index',
                'testimonials.index',
                'sliders.index',
                'charts.index',
            ],
        ],
                [
                    'text'  => 'Články',
                    'icon_color'  => 'orange',
                    'route' => 'news.index',
                    'icon'  => 'fas fa-font',
                    'can'  => 'news.index',
                ],
                [
                    'text'  => 'Kňazi',
                    'icon_color'  => 'orange',
                    'route' => 'priests.index',
                    'icon'  => 'fas fa-hands',
                    'can'  => 'priests.index',
                ],
                [
                    'text'  => 'Svedectvá',
                    'icon_color'  => 'orange',
                    'route' => 'testimonials.index',
                    'icon'  => 'fas fa-comment-medical',
                    'can'  => 'testimonials.index',
                ],
                [
                    'text'  => 'Obrázok s myšlienkou',
                    'icon_color'  => 'orange',
                    'route' => 'sliders.index',
                    'icon'  => 'fas fa-image',
                    'can'  => 'sliders.index',
                ],
                [
                    'text'  => 'Modlidba dňa',
                    'icon_color'  => 'orange',
                    'route' => 'prayers.index',
                    'icon'  => 'fas fa-praying-hands',
                    'can'  => 'prayers.index',
                ],
                [
                    'text'  => 'Grafy',
                    'icon_color'  => 'orange',
                    'route' => 'charts.index',
                    'icon'  => 'fas fa-chart-line',
                    'can'  => 'charts.index',
                ],

        [
            'header' => 'Nastavenia',
            'can'  => [
                'categories.index',
                'tags.index',
            ],
        ],
                [
                    'text' => 'Kategórie článkov',
                    'icon_color'  => 'green',
                    'route' => 'categories.index',
                    'icon'  => 'fas fa-stream',
                    'can'  => 'categories.index',
                ],
                [
                    'text' => 'Kľúčové slová',
                    'icon_color'  => 'green',
                    'route' => 'tags.index',
                    'icon'  => 'fas fa-tag',
                    'can'  => 'tags.index',
                ],

        [
            'header' => 'Stránky',
            'can'  => [
                'static-pages.index',
                'galleries.index',
                'banners.index',
                'faqs.index',
                'pictures.index',
                'files.index',
                'file-manager',
            ],
        ],
                [
                    'text' => 'Vlastnosti stránok',
                    'icon_color'  => 'cyan',
                    'icon'  => 'fas fa-cubes',
                    'route' => 'static-pages.index',
                    'can'  => 'static-pages.index',
                ],
                [
                    'text' => 'Galérie',
                    'icon_color'  => 'cyan',
                    'icon'  => 'fas fa-images',
                    'route' => 'galleries.index',
                    'can'  => 'galleries.index',
                ],
                [
                    'text'  => 'Banery',
                    'icon_color'  => 'cyan',
                    'icon'  => 'far fa-flag',
                    'route' => 'banners.index',
                    'can'  => 'banners.index',
                ],
                [
                    'text'  => 'Otázky a odpovede',
                    'icon_color'  => 'cyan',
                    'icon'  => 'fas fa-question',
                    'route' => 'faqs.index',
                    'can'  => 'faqs.index',
                ],
                [
                    'text'  => 'Obrázky',
                    'icon_color'  => 'cyan',
                    'icon'  => 'far fa-image',
                    'route' => 'pictures.index',
                    'can'  => 'pictures.index',
                ],
                [
                    'text'  => 'Prílohy',
                    'icon_color'  => 'cyan',
                    'icon'  => 'fas fa-file-import',
                    'route' => 'files.index',
                    'can'  => 'files.index',
                ],
                [
                    'text'  => 'Správca šablon',
                    'icon_color'  => 'cyan',
                    'icon'  => 'fas fa-warehouse',
                    'route' => 'file-manager',
                    'can'  => 'file-manager',
                ],
        [
            'header' => 'Prístupové práva',
            'can'  => [
                'users.index',
                'roles.index',
                'permissions.index'
            ],
        ],
                [
                    'text' => 'Uživatelia',
                    'icon_color'  => 'red',
                    'icon'  => 'fas fa-users',
                    'route' => 'users.index',
                    'can'  => 'users.index',
                ],
                [
                    'text' => 'Roly',
                    'icon_color'  => 'red',
                    'icon'  => 'fas fa-chess-queen',
                    'route' => 'roles.index',
                    'can'  => 'roles.index',
                ],
                [
                    'text' => 'Povolenia',
                    'icon_color'  => 'red',
                    'icon'  => 'fas fa-key',
                    'route' => 'permissions.index',
                    'can'  => 'permissions.index',
                ],
        [
            'header' => 'Logovanie',
            'can'  => [
                'log-activity.index',
                'log-activity.post',
            ],
        ],
                [
                    'text' => 'Aktivita užívateľov',
                    'icon_color'  => 'yellow',
                    'icon'  => 'fas fa-thumbtack',
                    'route' => 'log-activity.index',
                    'can'  => [
                        'log-activity.index',
                        'log-activity.post',
                    ],
                ],

        // [
        //     'text'    => 'Tabuľky',
        //     'icon_color'  => 'green',
        //     'icon'    => 'fas fa-cog',
        //     'submenu' => [
        //         [
        //             'text' => 'Kategórie článkov',
        //             'route' => 'categories.index',
        //         ],
        //         [
        //             'text' => 'Kľúčové slová',
        //             'route' => 'tags.index',
        //         ],
        //     ],
        // ],
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
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/select2/js/select2.full.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2/css/select2.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/select2-bootstrap4-theme/select2-bootstrap4.min.css',
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
        'bsCustomFileInput' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/bs-custom-file-input/bs-custom-file-input.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/sweetalert2/sweetalert2.min.css',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/sweetalert2/sweetalert2.min.js',
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
        'Toastr' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/toastr/toastr.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/toastr/toastr.min.js',
                ],
            ],
        ],
        'Dropzone' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/dropzone/5.9.3/dropzone.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/dropzone/5.9.3/dropzone.min.js',
                ],
            ],
        ],
        'Moment' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/moment/moment-with-locales.min.js',
                ],
            ],
        ],
        'Tempus Dominus for Bootstrap 4' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js',
                ],
            ],
        ],
        'Summernote' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/summernote/summernote-bs4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => true,
                    'location' => 'vendor/summernote/summernote-bs4.min.css',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Here we change the IFrame mode configuration. Note these changes will
    | only apply to the view that extends and enable the IFrame mode.
    |
    | For detailed instructions you can look the iframe mode section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/IFrame-Mode-Configuration
    |
    */

    'iframe' => [
        'default_tab' => [
            'url' => null,
            'title' => null,
        ],
        'buttons' => [
            'close' => true,
            'close_all' => true,
            'close_all_other' => true,
            'scroll_left' => true,
            'scroll_right' => true,
            'fullscreen' => true,
        ],
        'options' => [
            'loading_screen' => 1000,
            'auto_show_new_tab' => true,
            'use_navbar_items' => true,
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
    |
    */

    'livewire' => false,
];
