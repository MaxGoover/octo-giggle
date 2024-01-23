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

Route::resource('todos', TodoController::class);

Route::get('/', function () {
    return Inertia('desktop/views/DesktopPageDashboard');
});
