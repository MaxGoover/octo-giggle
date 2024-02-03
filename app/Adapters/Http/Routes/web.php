<?php

use App\Adapters\Http\Actions\Worker\Index\WorkerIndexAction;
use App\Adapters\Http\Actions\Auth\BySms\Form\AuthBySmsFormAction;
use App\Adapters\Http\Actions\Auth\BySms\Confirm\AuthBySmsConfirmAction;
use App\Adapters\Http\Actions\Auth\ByPassword\AuthByPasswordFormAction;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// auth
Route::get('auth/by-sms-form', AuthBySmsFormAction::class)
    // ->name('auth')
    ->middleware('guest');

Route::get('auth/by-sms-confirm', AuthBySmsConfirmAction::class)
    // ->name('auth')
    ->middleware('guest');

Route::get('auth/by-password-form', AuthByPasswordFormAction::class)
    // ->name('auth')
    ->middleware('guest');

// Route::post('auth', AuthSendSmsCodeAction::class)
//     ->name('login.store')
//     ->middleware('guest');

// Route::get('users', [UsersController::class, 'index'])
//     ->name('users')
//     ->middleware('auth');

// Route::get('workers', function () {
//     return Inertia('desktop/views/workers/DesktopPageWorkersIndex');
// });

Route::get('/workers', [WorkerIndexAction::class, 'handle']);

Route::get('/', function () {
    return Inertia('desktop/views/DesktopPageDashboard');
});
