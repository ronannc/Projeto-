<?php return array (
  'adminlte' => 
  array (
    'title' => 'Virtual Training',
    'title_prefix' => 'VT',
    'title_postfix' => '',
    'logo' => '<b>Virtual</b> Training',
    'logo_mini' => '<b>V</b> T',
    'skin' => 'blue',
    'layout' => NULL,
    'collapse_sidebar' => false,
    'right_sidebar' => false,
    'right_sidebar_icon' => 'fas fa-cogs',
    'right_sidebar_theme' => 'dark',
    'right_sidebar_slide' => true,
    'dashboard_url' => 'home',
    'logout_url' => 'logout',
    'logout_method' => NULL,
    'login_url' => 'login',
    'register_url' => 'register',
    'menu' => 
    array (
      0 => 
      array (
        'header' => 'Exercícios',
      ),
      1 => 
      array (
        'text' => 'Bíceps',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'can' => 'list_biceps',
            'route' => 'biceps.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'can' => 'add_biceps',
            'route' => 'biceps.create',
          ),
        ),
      ),
      2 => 
      array (
        'text' => 'Costa',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'can' => 'list_back',
            'route' => 'backs.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'can' => 'add_back',
            'route' => 'backs.create',
          ),
        ),
      ),
      3 => 
      array (
        'text' => 'Membros Inferiores',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'can' => 'list_lower_member',
            'route' => 'lower-members.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'can' => 'add_lower_member',
            'route' => 'lower-members.create',
          ),
        ),
      ),
      4 => 
      array (
        'text' => 'Ombros',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'can' => 'list_shoulder',
            'route' => 'shoulders.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'can' => 'add_shoulder',
            'route' => 'shoulders.create',
          ),
        ),
      ),
      5 => 
      array (
        'text' => 'Peitoral',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'can' => 'list_breast',
            'route' => 'breasts.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'can' => 'add_breast',
            'route' => 'breasts.create',
          ),
        ),
      ),
      6 => 
      array (
        'text' => 'Tríceps',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'can' => 'list_triceps',
            'route' => 'triceps.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'can' => 'add_triceps',
            'route' => 'triceps.create',
          ),
        ),
      ),
      7 => 
      array (
        'header' => 'Clientes',
      ),
      8 => 
      array (
        'text' => 'Clientes',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'route' => 'clients.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'route' => 'clients.create',
          ),
        ),
      ),
      9 => 
      array (
        'text' => 'Avaliacao Física',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'route' => 'physical-assessments.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'route' => 'physical-assessments.create',
          ),
        ),
      ),
      10 => 
      array (
        'header' => 'Treinos',
      ),
      11 => 
      array (
        'text' => 'Treinos',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'route' => 'workouts.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'route' => 'workouts.create',
          ),
        ),
      ),
      12 => 
      array (
        'text' => 'Métodos de Treino',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'can' => 'list_workout_modes',
            'route' => 'workout-modes.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'can' => 'add_workout_modes',
            'route' => 'workout-modes.create',
          ),
        ),
      ),
      13 => 
      array (
        'text' => 'Objetivos de Treino',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'can' => 'list_goals',
            'route' => 'goals.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'can' => 'add_goals',
            'route' => 'goals.create',
          ),
        ),
      ),
      14 => 
      array (
        'header' => 'Administrador',
      ),
      15 => 
      array (
        'text' => 'Empresas',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'can' => 'list_companies',
            'route' => 'companies.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'can' => 'add_companies',
            'route' => 'companies.create',
          ),
        ),
      ),
      16 => 
      array (
        'text' => 'Usuários',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Gerentes',
            'submenu' => 
            array (
              0 => 
              array (
                'text' => 'Listar',
                'can' => 'list_managers',
                'route' => 'managers.index',
              ),
              1 => 
              array (
                'text' => 'Cadastrar',
                'can' => 'add_managers',
                'route' => 'managers.create',
              ),
            ),
          ),
          1 => 
          array (
            'text' => 'Online',
            'route' => 'users.online',
          ),
        ),
      ),
      17 => 
      array (
        'text' => 'Administradores',
        'can' => 'list_users',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'can' => 'list_users',
            'route' => 'users.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'can' => 'add_users',
            'route' => 'users.create',
          ),
        ),
      ),
      18 => 
      array (
        'text' => 'Roles',
        'can' => 'list_roles',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'can' => 'list_roles',
            'route' => 'roles.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'can' => 'add_roles',
            'route' => 'roles.create',
          ),
        ),
      ),
      19 => 
      array (
        'text' => 'Permissions',
        'can' => 'list_permissions',
        'submenu' => 
        array (
          0 => 
          array (
            'text' => 'Listar',
            'can' => 'list_permissions',
            'route' => 'permissions.index',
          ),
          1 => 
          array (
            'text' => 'Cadastrar',
            'can' => 'add_permissions',
            'route' => 'permissions.create',
          ),
        ),
      ),
      20 => 
      array (
        'text' => 'Auditoria',
        'can' => 'list_audits',
        'route' => 'audits.index',
      ),
      21 => 
      array (
        'text' => 'Notificações',
        'can' => 'list_notifications',
        'route' => 'notifications.index',
      ),
      22 => 
      array (
        'text' => 'Logs',
        'can' => 'list_logs',
        'route' => 'log-viewer::dashboard',
      ),
    ),
    'filters' => 
    array (
      0 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\HrefFilter',
      1 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\ActiveFilter',
      2 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\SubmenuFilter',
      3 => 'JeroenNoten\\LaravelAdminLte\\Menu\\Filters\\ClassesFilter',
      4 => 'App\\Filter\\MenuFilter',
    ),
    'plugins' => 
    array (
      'datatables' => true,
      'select2' => true,
      'chartjs' => true,
    ),
  ),
  'app' => 
  array (
    'name' => 'Virtual Training',
    'env' => 'local',
    'debug' => true,
    'url' => 'http://localhost',
    'asset_url' => NULL,
    'timezone' => 'America/Sao_Paulo',
    'locale' => 'pt-br',
    'fallback_locale' => 'pt-br',
    'faker_locale' => 'pt-br',
    'key' => 'base64:mdl2N4PRHnfWGVTXU581Nzbwj8qwK0MvF1UdbERY59M=',
    'cipher' => 'AES-256-CBC',
    'providers' => 
    array (
      0 => 'Illuminate\\Auth\\AuthServiceProvider',
      1 => 'Illuminate\\Broadcasting\\BroadcastServiceProvider',
      2 => 'Illuminate\\Bus\\BusServiceProvider',
      3 => 'Illuminate\\Cache\\CacheServiceProvider',
      4 => 'Illuminate\\Foundation\\Providers\\ConsoleSupportServiceProvider',
      5 => 'Illuminate\\Cookie\\CookieServiceProvider',
      6 => 'Illuminate\\Database\\DatabaseServiceProvider',
      7 => 'Illuminate\\Encryption\\EncryptionServiceProvider',
      8 => 'Illuminate\\Filesystem\\FilesystemServiceProvider',
      9 => 'Illuminate\\Foundation\\Providers\\FoundationServiceProvider',
      10 => 'Illuminate\\Hashing\\HashServiceProvider',
      11 => 'Illuminate\\Mail\\MailServiceProvider',
      12 => 'Illuminate\\Notifications\\NotificationServiceProvider',
      13 => 'Illuminate\\Pagination\\PaginationServiceProvider',
      14 => 'Illuminate\\Pipeline\\PipelineServiceProvider',
      15 => 'Illuminate\\Queue\\QueueServiceProvider',
      16 => 'Illuminate\\Redis\\RedisServiceProvider',
      17 => 'Illuminate\\Auth\\Passwords\\PasswordResetServiceProvider',
      18 => 'Illuminate\\Session\\SessionServiceProvider',
      19 => 'Illuminate\\Translation\\TranslationServiceProvider',
      20 => 'Illuminate\\Validation\\ValidationServiceProvider',
      21 => 'Illuminate\\View\\ViewServiceProvider',
      22 => 'App\\Providers\\AppServiceProvider',
      23 => 'App\\Providers\\AuthServiceProvider',
      24 => 'App\\Providers\\EventServiceProvider',
      25 => 'App\\Providers\\HorizonServiceProvider',
      26 => 'App\\Providers\\RouteServiceProvider',
      27 => 'App\\Providers\\RepositoriesServiceProvider',
      28 => 'JeroenNoten\\LaravelAdminLte\\ServiceProvider',
      29 => 'Yajra\\Datatables\\DatatablesServiceProvider',
      30 => 'Yajra\\Datatables\\ButtonsServiceProvider',
      31 => 'Spatie\\Permission\\PermissionServiceProvider',
      32 => 'OwenIt\\Auditing\\AuditingServiceProvider',
      33 => 'Fx3costa\\LaravelChartJs\\Providers\\ChartjsServiceProvider',
      34 => 'Arcanedev\\LogViewer\\LogViewerServiceProvider',
    ),
    'aliases' => 
    array (
      'App' => 'Illuminate\\Support\\Facades\\App',
      'Artisan' => 'Illuminate\\Support\\Facades\\Artisan',
      'Auth' => 'Illuminate\\Support\\Facades\\Auth',
      'Blade' => 'Illuminate\\Support\\Facades\\Blade',
      'Broadcast' => 'Illuminate\\Support\\Facades\\Broadcast',
      'Bus' => 'Illuminate\\Support\\Facades\\Bus',
      'Cache' => 'Illuminate\\Support\\Facades\\Cache',
      'Config' => 'Illuminate\\Support\\Facades\\Config',
      'Cookie' => 'Illuminate\\Support\\Facades\\Cookie',
      'Crypt' => 'Illuminate\\Support\\Facades\\Crypt',
      'DB' => 'Illuminate\\Support\\Facades\\DB',
      'Eloquent' => 'Illuminate\\Database\\Eloquent\\Model',
      'Event' => 'Illuminate\\Support\\Facades\\Event',
      'File' => 'Illuminate\\Support\\Facades\\File',
      'Gate' => 'Illuminate\\Support\\Facades\\Gate',
      'Hash' => 'Illuminate\\Support\\Facades\\Hash',
      'Lang' => 'Illuminate\\Support\\Facades\\Lang',
      'Log' => 'Illuminate\\Support\\Facades\\Log',
      'Mail' => 'Illuminate\\Support\\Facades\\Mail',
      'Notification' => 'Illuminate\\Support\\Facades\\Notification',
      'Password' => 'Illuminate\\Support\\Facades\\Password',
      'Queue' => 'Illuminate\\Support\\Facades\\Queue',
      'Redirect' => 'Illuminate\\Support\\Facades\\Redirect',
      'Redis' => 'Illuminate\\Support\\Facades\\Redis',
      'Request' => 'Illuminate\\Support\\Facades\\Request',
      'Response' => 'Illuminate\\Support\\Facades\\Response',
      'Route' => 'Illuminate\\Support\\Facades\\Route',
      'Schema' => 'Illuminate\\Support\\Facades\\Schema',
      'Session' => 'Illuminate\\Support\\Facades\\Session',
      'Storage' => 'Illuminate\\Support\\Facades\\Storage',
      'URL' => 'Illuminate\\Support\\Facades\\URL',
      'Validator' => 'Illuminate\\Support\\Facades\\Validator',
      'View' => 'Illuminate\\Support\\Facades\\View',
      'Datatables' => 'Yajra\\Datatables\\Facades\\Datatables',
    ),
  ),
  'audit' => 
  array (
    'implementation' => 'OwenIt\\Auditing\\Models\\Audit',
    'user' => 
    array (
      'morph_prefix' => 'user',
      'guards' => 
      array (
        0 => 'web',
        1 => 'api',
      ),
    ),
    'resolver' => 
    array (
      'user' => 'OwenIt\\Auditing\\Resolvers\\UserResolver',
      'ip_address' => 'OwenIt\\Auditing\\Resolvers\\IpAddressResolver',
      'user_agent' => 'OwenIt\\Auditing\\Resolvers\\UserAgentResolver',
      'url' => 'OwenIt\\Auditing\\Resolvers\\UrlResolver',
    ),
    'events' => 
    array (
      0 => 'created',
      1 => 'updated',
      2 => 'deleted',
      3 => 'restored',
    ),
    'strict' => false,
    'timestamps' => false,
    'threshold' => 0,
    'driver' => 'database',
    'drivers' => 
    array (
      'database' => 
      array (
        'table' => 'audits',
        'connection' => NULL,
      ),
    ),
    'console' => false,
  ),
  'auth' => 
  array (
    'defaults' => 
    array (
      'guard' => 'web',
      'passwords' => 'users',
    ),
    'guards' => 
    array (
      'web' => 
      array (
        'driver' => 'session',
        'provider' => 'users',
      ),
      'api' => 
      array (
        'driver' => 'passport',
        'provider' => 'users',
      ),
    ),
    'providers' => 
    array (
      'users' => 
      array (
        'driver' => 'eloquent',
        'model' => 'App\\Models\\User',
      ),
    ),
    'passwords' => 
    array (
      'users' => 
      array (
        'provider' => 'users',
        'table' => 'password_resets',
        'expire' => 60,
      ),
    ),
  ),
  'broadcasting' => 
  array (
    'default' => 'redis',
    'connections' => 
    array (
      'pusher' => 
      array (
        'driver' => 'pusher',
        'key' => '',
        'secret' => '',
        'app_id' => '',
        'options' => 
        array (
          'cluster' => 'mt1',
          'encrypted' => true,
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
      ),
      'log' => 
      array (
        'driver' => 'log',
      ),
      'null' => 
      array (
        'driver' => 'null',
      ),
    ),
  ),
  'cache' => 
  array (
    'default' => 'redis',
    'stores' => 
    array (
      'apc' => 
      array (
        'driver' => 'apc',
      ),
      'array' => 
      array (
        'driver' => 'array',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'cache',
        'connection' => NULL,
      ),
      'file' => 
      array (
        'driver' => 'file',
        'path' => '/var/www/app/storage/framework/cache/data',
      ),
      'memcached' => 
      array (
        'driver' => 'memcached',
        'persistent_id' => NULL,
        'sasl' => 
        array (
          0 => NULL,
          1 => NULL,
        ),
        'options' => 
        array (
        ),
        'servers' => 
        array (
          0 => 
          array (
            'host' => '127.0.0.1',
            'port' => 11211,
            'weight' => 100,
          ),
        ),
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'cache',
      ),
    ),
    'prefix' => 'virtual_training_cache',
  ),
  'database' => 
  array (
    'default' => 'mysql',
    'connections' => 
    array (
      'sqlite' => 
      array (
        'driver' => 'sqlite',
        'database' => 'virtual-training',
        'prefix' => '',
        'foreign_key_constraints' => true,
      ),
      'mysql' => 
      array (
        'driver' => 'mysql',
        'host' => 'mariadb',
        'port' => '3306',
        'database' => 'virtual-training',
        'username' => 'virtual-training',
        'password' => 'virtual-training',
        'unix_socket' => '',
        'charset' => 'utf8mb4',
        'collation' => 'utf8mb4_unicode_ci',
        'prefix' => '',
        'prefix_indexes' => true,
        'strict' => true,
        'engine' => 'InnoDB',
        'dump' => 
        array (
          'dump_binary_path' => '/usr/local/mariadb/bin',
        ),
      ),
      'pgsql' => 
      array (
        'driver' => 'pgsql',
        'host' => 'mariadb',
        'port' => '3306',
        'database' => 'virtual-training',
        'username' => 'virtual-training',
        'password' => 'virtual-training',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
        'schema' => 'public',
        'sslmode' => 'prefer',
      ),
      'sqlsrv' => 
      array (
        'driver' => 'sqlsrv',
        'host' => 'mariadb',
        'port' => '3306',
        'database' => 'virtual-training',
        'username' => 'virtual-training',
        'password' => 'virtual-training',
        'charset' => 'utf8',
        'prefix' => '',
        'prefix_indexes' => true,
      ),
    ),
    'migrations' => 'migrations',
    'redis' => 
    array (
      'client' => 'predis',
      'default' => 
      array (
        'host' => 'redis',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
      ),
      'cache' => 
      array (
        'host' => 'redis',
        'password' => NULL,
        'port' => '6379',
        'database' => 1,
      ),
      'horizon' => 
      array (
        'host' => 'redis',
        'password' => NULL,
        'port' => '6379',
        'database' => 0,
        'options' => 
        array (
          'prefix' => 'horizon:',
        ),
      ),
    ),
  ),
  'datatables' => 
  array (
    'search' => 
    array (
      'smart' => true,
      'multi_term' => true,
      'case_insensitive' => true,
      'use_wildcards' => false,
    ),
    'index_column' => 'DT_RowIndex',
    'engines' => 
    array (
      'eloquent' => 'Yajra\\DataTables\\EloquentDataTable',
      'query' => 'Yajra\\DataTables\\QueryDataTable',
      'collection' => 'Yajra\\DataTables\\CollectionDataTable',
      'resource' => 'Yajra\\DataTables\\ApiResourceDataTable',
    ),
    'builders' => 
    array (
    ),
    'nulls_last_sql' => '%s %s NULLS LAST',
    'error' => NULL,
    'columns' => 
    array (
      'excess' => 
      array (
        0 => 'rn',
        1 => 'row_num',
      ),
      'escape' => '*',
      'raw' => 
      array (
        0 => 'action',
      ),
      'blacklist' => 
      array (
        0 => 'password',
        1 => 'remember_token',
      ),
      'whitelist' => '*',
    ),
    'json' => 
    array (
      'header' => 
      array (
      ),
      'options' => 0,
    ),
  ),
  'datatables-buttons' => 
  array (
    'namespace' => 
    array (
      'base' => 'DataTables',
      'model' => '',
    ),
    'pdf_generator' => 'snappy',
    'snappy' => 
    array (
      'options' => 
      array (
        'no-outline' => true,
        'margin-left' => '0',
        'margin-right' => '0',
        'margin-top' => '10mm',
        'margin-bottom' => '10mm',
      ),
      'orientation' => 'landscape',
    ),
    'parameters' => 
    array (
      'dom' => 'Bfrtip',
      'order' => 
      array (
        0 => 
        array (
          0 => 0,
          1 => 'desc',
        ),
      ),
      'buttons' => 
      array (
        0 => 'create',
        1 => 'export',
        2 => 'print',
        3 => 'reset',
        4 => 'reload',
      ),
    ),
    'generator' => 
    array (
      'columns' => 'id,add your columns,created_at,updated_at',
      'buttons' => 'create,export,print,reset,reload',
      'dom' => 'Bfrtip',
    ),
  ),
  'debug-server' => 
  array (
    'host' => 'tcp://127.0.0.1:9912',
  ),
  'filesystems' => 
  array (
    'default' => 'local',
    'cloud' => 's3',
    'disks' => 
    array (
      'local' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/app/storage/app',
      ),
      'public' => 
      array (
        'driver' => 'local',
        'root' => '/var/www/app/storage/app/public',
        'url' => 'http://localhost/storage',
        'visibility' => 'public',
      ),
      's3' => 
      array (
        'driver' => 's3',
        'key' => NULL,
        'secret' => NULL,
        'region' => NULL,
        'bucket' => NULL,
        'url' => NULL,
      ),
    ),
  ),
  'hashing' => 
  array (
    'driver' => 'bcrypt',
    'bcrypt' => 
    array (
      'rounds' => 10,
    ),
    'argon' => 
    array (
      'memory' => 1024,
      'threads' => 2,
      'time' => 2,
    ),
  ),
  'horizon' => 
  array (
    'domain' => NULL,
    'path' => 'horizon',
    'use' => 'default',
    'prefix' => 'horizon:',
    'middleware' => 
    array (
      0 => 'web',
    ),
    'waits' => 
    array (
      'redis:default' => 60,
    ),
    'trim' => 
    array (
      'recent' => 60,
      'failed' => 10080,
      'monitored' => 10080,
    ),
    'fast_termination' => false,
    'memory_limit' => 64,
    'environments' => 
    array (
      'production' => 
      array (
        'supervisor-1' => 
        array (
          'connection' => 'redis',
          'queue' => 
          array (
            0 => 'default',
            1 => 'notifications',
          ),
          'balance' => 'simple',
          'processes' => 2,
          'tries' => 3,
        ),
      ),
      'local' => 
      array (
        'supervisor-1' => 
        array (
          'connection' => 'redis',
          'queue' => 
          array (
            0 => 'default',
            1 => 'notifications',
          ),
          'balance' => 'simple',
          'processes' => 2,
          'tries' => 3,
        ),
      ),
    ),
  ),
  'log-viewer' => 
  array (
    'storage-path' => '/var/www/app/storage/logs',
    'pattern' => 
    array (
      'prefix' => 'laravel-',
      'date' => '[0-9][0-9][0-9][0-9]-[0-9][0-9]-[0-9][0-9]',
      'extension' => '.log',
    ),
    'locale' => 'auto',
    'theme' => 'bootstrap-4',
    'route' => 
    array (
      'enabled' => true,
      'attributes' => 
      array (
        'prefix' => 'log-viewer',
        'middleware' => NULL,
      ),
    ),
    'per-page' => 30,
    'facade' => 'LogViewer',
    'download' => 
    array (
      'prefix' => 'laravel-',
      'extension' => 'log',
    ),
    'menu' => 
    array (
      'filter-route' => 'log-viewer::logs.filter',
      'icons-enabled' => true,
    ),
    'icons' => 
    array (
      'all' => 'fa fa-fw fa-list',
      'emergency' => 'fa fa-fw fa-bug',
      'alert' => 'fa fa-fw fa-bullhorn',
      'critical' => 'fa fa-fw fa-heartbeat',
      'error' => 'fa fa-fw fa-times-circle',
      'warning' => 'fa fa-fw fa-exclamation-triangle',
      'notice' => 'fa fa-fw fa-exclamation-circle',
      'info' => 'fa fa-fw fa-info-circle',
      'debug' => 'fa fa-fw fa-life-ring',
    ),
    'colors' => 
    array (
      'levels' => 
      array (
        'empty' => '#D1D1D1',
        'all' => '#8A8A8A',
        'emergency' => '#B71C1C',
        'alert' => '#D32F2F',
        'critical' => '#F44336',
        'error' => '#FF5722',
        'warning' => '#FF9100',
        'notice' => '#4CAF50',
        'info' => '#1976D2',
        'debug' => '#90CAF9',
      ),
    ),
    'highlight' => 
    array (
      0 => '^#\\d+',
      1 => '^Stack trace:',
    ),
  ),
  'logging' => 
  array (
    'default' => 'slack',
    'channels' => 
    array (
      'stack' => 
      array (
        'driver' => 'stack',
        'channels' => 
        array (
          0 => 'daily',
        ),
      ),
      'single' => 
      array (
        'driver' => 'single',
        'path' => '/var/www/app/storage/logs/laravel.log',
        'level' => 'debug',
      ),
      'daily' => 
      array (
        'driver' => 'daily',
        'path' => '/var/www/app/storage/logs/laravel.log',
        'level' => 'debug',
        'days' => 14,
      ),
      'slack' => 
      array (
        'driver' => 'slack',
        'url' => 'https://hooks.slack.com/services/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',
        'username' => 'Virtual Trainning',
        'emoji' => ':exclamation:',
        'level' => 'debug',
      ),
      'papertrail' => 
      array (
        'driver' => 'monolog',
        'level' => 'debug',
        'handler' => 'Monolog\\Handler\\SyslogUdpHandler',
        'handler_with' => 
        array (
          'host' => NULL,
          'port' => NULL,
        ),
      ),
      'stderr' => 
      array (
        'driver' => 'monolog',
        'handler' => 'Monolog\\Handler\\StreamHandler',
        'formatter' => NULL,
        'with' => 
        array (
          'stream' => 'php://stderr',
        ),
      ),
      'syslog' => 
      array (
        'driver' => 'syslog',
        'level' => 'debug',
      ),
      'errorlog' => 
      array (
        'driver' => 'errorlog',
        'level' => 'debug',
      ),
    ),
  ),
  'mail' => 
  array (
    'driver' => 'smtp',
    'host' => 'smtp.mailtrap.io',
    'port' => '2525',
    'from' => 
    array (
      'address' => 'hello@example.com',
      'name' => 'Example',
    ),
    'encryption' => 'TLS',
    'username' => '0dbcc87ef06ce1',
    'password' => '57dff0d3500e8d',
    'sendmail' => '/usr/sbin/sendmail -bs',
    'markdown' => 
    array (
      'theme' => 'default',
      'paths' => 
      array (
        0 => '/var/www/app/resources/views/vendor/mail',
      ),
    ),
    'log_channel' => NULL,
  ),
  'permission' => 
  array (
    'models' => 
    array (
      'permission' => 'Spatie\\Permission\\Models\\Permission',
      'role' => 'Spatie\\Permission\\Models\\Role',
    ),
    'table_names' => 
    array (
      'roles' => 'roles',
      'permissions' => 'permissions',
      'model_has_permissions' => 'model_has_permissions',
      'model_has_roles' => 'model_has_roles',
      'role_has_permissions' => 'role_has_permissions',
    ),
    'column_names' => 
    array (
      'model_morph_key' => 'model_id',
    ),
    'display_permission_in_exception' => false,
    'cache' => 
    array (
      'expiration_time' => 
      DateInterval::__set_state(array(
         'y' => 0,
         'm' => 0,
         'd' => 0,
         'h' => 24,
         'i' => 0,
         's' => 0,
         'f' => 0.0,
         'weekday' => 0,
         'weekday_behavior' => 0,
         'first_last_day_of' => 0,
         'invert' => 0,
         'days' => false,
         'special_type' => 0,
         'special_amount' => 0,
         'have_weekday_relative' => 0,
         'have_special_relative' => 0,
      )),
      'key' => 'spatie.permission.cache',
      'model_key' => 'name',
      'store' => 'default',
    ),
  ),
  'queue' => 
  array (
    'default' => 'sync',
    'connections' => 
    array (
      'sync' => 
      array (
        'driver' => 'sync',
      ),
      'database' => 
      array (
        'driver' => 'database',
        'table' => 'jobs',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'beanstalkd' => 
      array (
        'driver' => 'beanstalkd',
        'host' => 'localhost',
        'queue' => 'default',
        'retry_after' => 90,
      ),
      'sqs' => 
      array (
        'driver' => 'sqs',
        'key' => 'your-public-key',
        'secret' => 'your-secret-key',
        'prefix' => 'https://sqs.us-east-1.amazonaws.com/your-account-id',
        'queue' => 'your-queue-name',
        'region' => 'us-east-1',
      ),
      'redis' => 
      array (
        'driver' => 'redis',
        'connection' => 'default',
        'queue' => 'default',
        'retry_after' => 90,
        'block_for' => NULL,
      ),
    ),
    'failed' => 
    array (
      'database' => 'mysql',
      'table' => 'failed_jobs',
    ),
  ),
  'services' => 
  array (
    'mailgun' => 
    array (
      'domain' => NULL,
      'secret' => NULL,
      'endpoint' => 'api.mailgun.net',
    ),
    'ses' => 
    array (
      'key' => NULL,
      'secret' => NULL,
      'region' => 'us-east-1',
    ),
    'sparkpost' => 
    array (
      'secret' => NULL,
    ),
    'stripe' => 
    array (
      'model' => 'App\\Models\\User',
      'key' => NULL,
      'secret' => NULL,
      'webhook' => 
      array (
        'secret' => NULL,
        'tolerance' => 300,
      ),
    ),
  ),
  'session' => 
  array (
    'driver' => 'redis',
    'lifetime' => '120',
    'expire_on_close' => false,
    'encrypt' => false,
    'files' => '/var/www/app/storage/framework/sessions',
    'connection' => NULL,
    'table' => 'sessions',
    'store' => NULL,
    'lottery' => 
    array (
      0 => 2,
      1 => 100,
    ),
    'cookie' => 'virtual_training_session',
    'path' => '/',
    'domain' => NULL,
    'secure' => false,
    'http_only' => true,
    'same_site' => NULL,
  ),
  'tinker' => 
  array (
    'commands' => 
    array (
    ),
    'dont_alias' => 
    array (
    ),
  ),
  'trustedproxy' => 
  array (
    'proxies' => NULL,
    'headers' => 30,
  ),
  'view' => 
  array (
    'paths' => 
    array (
      0 => '/var/www/app/resources/views',
    ),
    'compiled' => '/var/www/app/storage/framework/views',
  ),
  'passport' => 
  array (
    'private_key' => NULL,
    'public_key' => NULL,
  ),
  'excel' => 
  array (
    'exports' => 
    array (
      'chunk_size' => 1000,
      'pre_calculate_formulas' => false,
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'line_ending' => '
',
        'use_bom' => false,
        'include_separator_line' => false,
        'excel_compatibility' => false,
      ),
    ),
    'imports' => 
    array (
      'read_only' => true,
      'heading_row' => 
      array (
        'formatter' => 'slug',
      ),
      'csv' => 
      array (
        'delimiter' => ',',
        'enclosure' => '"',
        'escape_character' => '\\',
        'contiguous' => false,
        'input_encoding' => 'UTF-8',
      ),
    ),
    'extension_detector' => 
    array (
      'xlsx' => 'Xlsx',
      'xlsm' => 'Xlsx',
      'xltx' => 'Xlsx',
      'xltm' => 'Xlsx',
      'xls' => 'Xls',
      'xlt' => 'Xls',
      'ods' => 'Ods',
      'ots' => 'Ods',
      'slk' => 'Slk',
      'xml' => 'Xml',
      'gnumeric' => 'Gnumeric',
      'htm' => 'Html',
      'html' => 'Html',
      'csv' => 'Csv',
      'tsv' => 'Csv',
      'pdf' => 'Dompdf',
    ),
    'value_binder' => 
    array (
      'default' => 'Maatwebsite\\Excel\\DefaultValueBinder',
    ),
    'transactions' => 
    array (
      'handler' => 'db',
    ),
    'temporary_files' => 
    array (
      'local_path' => '/tmp',
      'remote_disk' => NULL,
    ),
  ),
  'datatables-html' => 
  array (
    'table' => 
    array (
      'class' => 'table',
      'id' => 'dataTableBuilder',
    ),
    'callback' => 
    array (
      0 => '$',
      1 => '$.',
      2 => 'function',
    ),
    'script' => 'datatables::script',
    'editor' => 'datatables::editor',
  ),
);
