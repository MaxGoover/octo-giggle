<?php

use Illuminate\Support\Facades\Facade;
use Illuminate\Support\ServiceProvider;

return [
    'aliases' => Facade::defaultAliases()->merge([
        // 'Example' => App\Facades\Example::class,
    ])->toArray(),
    'asset_url' => env('ASSET_URL'),
    'cipher' => 'AES-256-CBC',
    'debug' => (bool) env('APP_DEBUG', false),
    'env' => env('APP_ENV', 'production'),
    'faker_locale' => 'en_US',
    'fallback_locale' => 'en',
    'key' => env('APP_KEY'),
    'locale' => 'en',
    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],
    'name' => env('APP_NAME', 'Laravel'),
    'providers' => ServiceProvider::defaultProviders()->merge([
        /* Package Service Providers... */
        /* Application Service Providers... */
        App\Adapters\Providers\AppServiceProvider::class,
        App\Adapters\Providers\AuthServiceProvider::class,
        // App\Providers\BroadcastServiceProvider::class,
        App\Adapters\Providers\EventServiceProvider::class,
        App\Adapters\Providers\RouteServiceProvider::class,
    ])->toArray(),
    'timezone' => 'UTC',
    'url' => env('APP_URL', 'http://localhost'),
    'version' => '0.0.1',
];
