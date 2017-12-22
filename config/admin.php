<?php

return [

    'title' => '后台管理',

    'theme' => 'adminlte',

    'upload' => [

        "avatar" => "avatar",

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

    'avatar' => [
        // 生成图片大小
        'size' => 256,

        // 字母字体
        'letter_font' => public_path("packages/admin/fonts/SourceHanSansCN-Normal.ttf"),

        // 亚洲字体
        'asian_font' => public_path("packages/admin/fonts/SourceHanSansCN-Normal.ttf"),

    ],
];