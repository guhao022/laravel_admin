<?php

return [

    'title' => '后台管理',

    'upload' => [
        "path" => "upload",
    ],

    'route' => [

        'prefix' => 'admin',

        'namespace' => 'App\\Admin\\Controllers',
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
                'model'  => Modules\Admin\Models\Users::class,
            ],
        ],
    ],

];