<?php

use App\Filter\MenuFilter;
use App\Models\User;

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | The default title of your admin panel, this goes into the title tag
    | of your page. You can override it per page with the title section.
    | You can optionally also specify a title prefix and/or postfix.
    |
    */

    'title' => 'Virtual Training',

    'title_prefix' => 'VT',

    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | This logo is displayed at the upper left corner of your admin panel.
    | You can use basic HTML here if you want. The logo has also a mini
    | variant, used for the mini side bar. Make it 3 letters or so
    |
    */

    'logo' => '<b>Virtual</b> Training',

    'logo_mini' => '<b>V</b> T',

    /*
    |--------------------------------------------------------------------------
    | Skin Color
    |--------------------------------------------------------------------------
    |
    | Choose a skin color for your admin panel. The available skin colors:
    | blue, black, purple, yellow, red, and green. Each skin also has a
    | ligth variant: blue-light, purple-light, purple-light, etc.
    |
    */

    'skin' => 'blue',

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Choose a layout for your admin panel. The available layout options:
    | null, 'boxed', 'fixed', 'top-nav'. null is the default, top-nav
    | removes the sidebar and places your menu in the top navbar
    |
    */

    'layout' => null,

    /*
    |--------------------------------------------------------------------------
    | Collapse Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we choose and option to be able to start with a collapsed side
    | bar. To adjust your sidebar layout simply set this  either true
    | this is compatible with layouts except top-nav layout option
    |
    */

    'collapse_sidebar' => false,

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Register here your dashboard, logout, login and register URLs. The
    | logout URL automatically sends a POST request in Laravel 5.3 or higher.
    | You can set the request to a GET or POST with logout_method.
    | Set register_url to null if you don't want a register link.
    |
    */

    'dashboard_url' => 'home',

    'logout_url' => 'logout',

    'logout_method' => null,

    'login_url' => 'login',

    'register_url' => 'register',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Specify your menu items to display in the left sidebar. Each menu item
    | should have a text and and a URL. You can also specify an icon from
    | Font Awesome. A string instead of an array represents a header in sidebar
    | layout. The 'can' is a filter on Laravel's built in Gate functionality.
    |
    */

    'menu' => [

        [
            'header' => 'Exercícios',
        ],
        [
            'text'    => 'Bíceps',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'can'         => 'list_biceps',
                    'route' => 'biceps.index'

                ],
                [
                    'text'  => 'Cadastrar',
                    'can'         => 'add_biceps',
                    'route' => 'biceps.create'
                ],
            ],
        ],

        [
            'text'    => 'Costa',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'can'        =>  'list_back',
                    'route' => 'backs.index'
                ],
                [
                    'text'  => 'Cadastrar',
                    'can'        =>  'add_back',
                    'route' => 'backs.create'
                ],
            ],
        ],

        [
            'text'    => 'Membros Inferiores',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'can'        =>  'list_lower_member',
                    'route' => 'lower-members.index'
                ],
                [
                    'text'  => 'Cadastrar',
                    'can'        =>  'add_lower_member',
                    'route' => 'lower-members.create'
                ],
            ],
        ],

        [
            'text'    => 'Ombros',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'can'        =>  'list_shoulder',
                    'route' => 'shoulders.index'
                ],
                [
                    'text'  => 'Cadastrar',
                    'can'        =>  'add_shoulder',
                    'route' => 'shoulders.create'
                ],
            ],
        ],

        [
            'text'    => 'Peitoral',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'can'        =>  'list_breast',
                    'route' => 'breasts.index'
                ],
                [
                    'text'  => 'Cadastrar',
                    'can'        =>  'add_breast',
                    'route' => 'breasts.create'
                ],
            ],
        ],

        [
            'text'    => 'Tríceps',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'can'        =>  'list_triceps',
                    'route' => 'triceps.index'
                ],
                [
                    'text'  => 'Cadastrar',
                    'can'        =>  'add_triceps',
                    'route' => 'triceps.create'
                ],
            ],
        ],

        [
            'header' => 'Clientes',
        ],

        [
            'text'    => 'Clientes',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'route' => 'clients.index',
                ],
                [
                    'text'  => 'Cadastrar',
                    'route' => 'clients.create',
                ],
            ],
        ],

        [
            'text'    => 'Avaliacao Física',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'route' => 'physical-assessments.index',
                ],
                [
                    'text'  => 'Cadastrar',
                    'route' => 'physical-assessments.create',
                ],
            ],
        ],

        [
            'header' => 'Treinos',
        ],

        [
            'text'    => 'Treinos',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'route' => 'workouts.index',
                ],
                [
                    'text'  => 'Cadastrar',
                    'route' => 'workouts.create',
                ],
            ],
        ],

        [
            'text'    => 'Métodos de Treino',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'can'        =>  'list_workout_modes',
                    'route' => 'workout-modes.index',
                ],
                [
                    'text'  => 'Cadastrar',
                    'can'        =>  'add_workout_modes',
                    'route' => 'workout-modes.create',
                ],
            ],
        ],

        [
            'text'    => 'Objetivos de Treino',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'can'        =>  'list_goals',
                    'route' => 'goals.index',
                ],
                [
                    'text'  => 'Cadastrar',
                    'can'        =>  'add_goals',
                    'route' => 'goals.create',
                ],
            ],
        ],


        // MENU DE ADMINISTRADORES

        [
            'header' => 'Administrador',
        ],

        [
            'text'    => 'Empresas',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'can'        =>  'list_companies',
                    'route' => 'companies.index',
                ],
                [
                    'text'  => 'Cadastrar',
                    'can'        =>  'add_companies',
                    'route' => 'companies.create',
                ],
            ],
        ],

        [
            'text'    => 'Usuários',
            'submenu' => [
                [
                    'text'    => 'Gerentes',
                    'submenu' => [
                        [
                            'text'  => 'Listar',
                            'can'        =>  'list_managers',
                            'route' => 'managers.index',
                        ],
                        [
                            'text'  => 'Cadastrar',
                            'can'        =>  'add_managers',
                            'route' => 'managers.create',
                        ],
                    ],
                ],
                [
                    'text'  => 'Online',
                    'route' => 'users.online',
                ],
            ],
        ],

        [
            'text'    => 'Administradores',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'can'        =>  'list_users',
                    'route' => 'users.index',
                ],
                [
                    'text'  => 'Cadastrar',
                    'can'        =>  'add_users',
                    'route' => 'users.create',
                ],
            ],
        ],

        [
            'text'    => 'Roles',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'can'        =>  'list_roles',
                    'route' => 'roles.index',
                ],
                [
                    'text'  => 'Cadastrar',
                    'can'        =>  'add_roles',
                    'route' => 'roles.create',
                ],
            ],
        ],

        [
            'text'    => 'Permissions',
            'submenu' => [
                [
                    'text'  => 'Listar',
                    'can'        =>  'list_permissions',
                    'route' => 'permissions.index',
                ],
                [
                    'text'  => 'Cadastrar',
                    'can'        =>  'add_permissions',
                    'route' => 'permissions.create',
                ],
            ],
        ],

        [
            'text'  => 'Auditoria',
            'can'        =>  'list_audits',
            'route' => 'audits.index',
        ],

        [
            'text'  => 'Notificações',
            'can'        =>  'list_notifications',
            'route' => 'notifications.index',
        ],

        [
            'text'  => 'Logs',
            'cab'        =>  'list_logs',
            'route' => 'log-viewer::dashboard',
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Choose what filters you want to include for rendering the menu.
    | You can add your own filters to this array after you've created them.
    | You can comment out the GateFilter if you don't want to use Laravel's
    | built in Gate functionality
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SubmenuFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        MenuFilter::class
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Choose which JavaScript plugins should be included. At this moment,
    | only DataTables is supported as a plugin. Set the value to true
    | to include the JavaScript file from a CDN via a script tag.
    |
    */

    'plugins' => [
        'datatables' => true,
        'select2'    => true,
        'chartjs'    => true,
    ],
];
