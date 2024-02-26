<?php

return [
    'defaults' => [
        'guard' => 'web',
        'passwords' => 'users',
    ],
    'email_code' => [
        'between' => [
            'min' => 11111,
            'max' => 99999,
        ],
    ],
    'guards' => [
        'web' => [
            'driver' => 'session',
            'provider' => 'users',
        ],
    ],
    'password' => [
        'length' => [
            'min' => 6,
            'max' => 50,
        ],
    ],
    'password_timeout' => 10800,
    'passwords' => [
        'users' => [
            'provider' => 'users',
            'table' => 'password_reset_tokens',
            'expire' => 60,
            'throttle' => 60,
        ],
    ],
    'providers' => [
        'users' => [
            'driver' => 'eloquent',
            'model' => App\Entities\User::class,
        ],
    ],
];
