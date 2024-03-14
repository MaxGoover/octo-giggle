<?php

use Illuminate\Support\Str;

return [
    'connection' => env('SESSION_CONNECTION'),
    'cookie' => env(
        'SESSION_COOKIE',
        Str::slug(env('APP_NAME', 'laravel'), '_') . '_session'
    ),
    'domain' => env('SESSION_DOMAIN'),
    'driver' => env('SESSION_DRIVER', 'file'),
    'encrypt' => false,
    'expire_on_close' => false,
    'files' => storage_path('framework/sessions'),
    'http_only' => true,
    'lifetime' => env('SESSION_LIFETIME', 120),
    'path' => '/',
    'store' => env('SESSION_STORE'),
    'table' => 'sessions',
    'lottery' => [2, 100],
    'partitioned' => false,
    'same_site' => 'lax',
    'secure' => env('SESSION_SECURE_COOKIE'),

];
