<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/auth', function () {
    return Inertia('desktop/views/DesktopPageAuth');
});

Route::get('/workers', function () {
    return Inertia('desktop/views/workers/DesktopPageWorkersIndex');
});

Route::get('/', function () {
    return Inertia('desktop/views/DesktopPageDashboard');
});
