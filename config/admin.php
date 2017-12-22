<?php

return [

    'title' => '后台管理',

    'theme' => 'adminlte',

    'upload' => [
        "path" => "upload",
    ],

    'pagination' => [
        'number' => 20,
    ],

    'route' => [

        'prefix' => 'admin',

        'namespace' => 'Modules\\Admin\\Controllers',
    ],

    'auth' => [
        'guards' => [
            'admin' => [
                'driver'   => 'session',
                'provider' => 'admin',
            ],
        ],

        'providers' => [
            'admin' => [
                'driver' => 'eloquent',
                'model'  => Modules\Admin\Models\AdminUser::class,
            ],
        ],
    ],

];