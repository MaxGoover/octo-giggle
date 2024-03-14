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
    'faker_locale' => 'ru_RU',
    'fallback_locale' => 'ru',
    'key' => env('APP_KEY'),
    'locale' => env('APP_LOCALE', 'ru'),
    'maintenance' => [
        'driver' => 'file',
        // 'store' => 'redis',
    ],
    'name' => env('APP_NAME', 'Laravel'),
    /**
     * Поставщики услуг несут ответственность за загрузку базы данных, очереди,
     * маршрутизации, компонентов проверки и тд.
     */
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
