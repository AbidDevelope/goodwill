<?php

return [


    'defaults' => [
        'guard' => 'web',
        'passwords' => 'admins',
    ],



    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'admins',
        ],

        'vendor' => [
            'driver' => 'session',
            'provider' => 'vendors'
        ],

        'user' => [
            'driver' => 'session',
            'provider' => 'users',
        ],

    ],



    'providers' => [
        'admins' => [
            'driver' => 'eloquent',
            'model' => App\Models\Admin::class,
        ],

        'vendors' => [
            'driver' => 'eloquent',
            'model' => App\Models\Vendor::class,
        ],
        
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Models\User::class,
        ]


        // 'admins' => [
        //     'driver' => 'database',
        //     'table' => 'admins',
        // ],
    ],



    'passwords' => [
        'admins' => [
            'provider' => 'admins',
            'table' => 'password_resets',
            'expire' => 60,
            'throttle' => 60,
        ],

        'vendors' => [
            'provider' => 'vendors',
            'table' => 'password',
            'expire' => 60,
            'throttle' => 60,
        ],
        
        'users' => [
            'provider' => 'users',
            'table' => 'password',
            'expire' => 60,
            'throttle' => 60,
        ],
    
    ],

    'password_timeout' => 10800,

];