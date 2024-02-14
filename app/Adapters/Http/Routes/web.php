<?php

use App\Adapters\Http\Actions\Worker\Index\WorkerIndexAction;
use App\Adapters\Http\Actions\Auth\ByEmail\AuthByEmailAction;
use App\Adapters\Http\Actions\Auth\ByEmail\AuthByEmailConfirmAction;
use App\Adapters\Http\Actions\Auth\ByEmail\AuthByEmailFormAction;
use App\Adapters\Http\Actions\Auth\ByPhone\AuthByPhoneAction;
use App\Adapters\Http\Actions\Auth\ByPhone\AuthByPhoneConfirmAction;
use App\Adapters\Http\Actions\Dashboard\DashboardAction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/


// auth
Route::get('auth/by-email-form', AuthByEmailAction::class)
    ->name('auth')
    ->middleware('guest');

Route::post('auth/by-email-form', AuthByEmailFormAction::class)
    ->name('auth.by_email_form')
    ->middleware('guest');

Route::post('auth/by-email-confirm', AuthByEmailConfirmAction::class)
    ->name('auth.by_email_confirm')
    ->middleware('guest');

Route::get('auth/by-phone-form', AuthByPhoneAction::class)
    ->name('auth.by_phone_form')
    ->middleware('guest');

Route::get('auth/by-phone-confirm', function () {
    return redirect('auth/by-phone-form');
})
    ->middleware('guest');

Route::post('auth/by-phone-confirm', AuthByPhoneConfirmAction::class)
    ->name('auth.by_phone_confirm')
    ->middleware('guest');

Route::get('/', DashboardAction::class)
    ->name('home')
    ->middleware('auth');

Route::get('/workers', [WorkerIndexAction::class, 'handle']);
