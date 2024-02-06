<?php

use App\Adapters\Http\Actions\Worker\Index\WorkerIndexAction;
use App\Adapters\Http\Actions\Auth\BySms\Form\AuthBySmsFormAction;
use App\Adapters\Http\Actions\Auth\ByPassword\AuthByPasswordFormAction;
use App\Adapters\Http\Actions\Auth\BySms\Confirm\AuthGetSmsCodeAction;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// идем постОм в 'auth/get-sms-code' (отдаем номер телефона)
// если такого пользователя нет, отдаем ошибку - пользователь с таким номером не зарегистрирован
// если все ок, тогда возвращаем номер телефона и id`шник смс-ки и редиректим пользователя на страницу 'auth/by-sms-confirm'

// auth
Route::get('auth/by-sms-form', AuthBySmsFormAction::class)
    ->middleware('guest');

Route::post('auth/send-sms-code', AuthGetSmsCodeAction::class)
    ->middleware('guest');

Route::get('auth/by-sms-confirm', function () {
    return redirect('auth/by-sms-form');
})
    ->middleware('guest');

// Route::post('auth/by-sms-confirm', AuthBySmsConfirmAction::class)
//     ->middleware('guest');

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
