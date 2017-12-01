<?php

return [

    'title' => '后台管理',

    'upload' => [
        "path" => "upload",
    ],

    'auth' => [
        'guards' => [
            'hive' => [
                'driver'   => 'session',
                'provider' => 'admin',
            ],
        ],

        'providers' => [
            'hive' => [
                'driver' => 'eloquent',
                'model'  => Modules\Admin\Models\Users::class,
            ],
        ],
    ],

];