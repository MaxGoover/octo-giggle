<?php

use App\Adapters\Events\UploadFileProductsNotification;
use App\Adapters\Http\Actions\Auth\AuthSignOutAction;
use App\Adapters\Http\Actions\Auth\ByEmail\AuthByEmailAction;
use App\Adapters\Http\Actions\Auth\ByEmail\AuthByEmailConfirmAction;
use App\Adapters\Http\Actions\Auth\ByEmail\AuthByEmailFormAction;
use App\Adapters\Http\Actions\Auth\ByPhone\AuthByPhoneAction;
use App\Adapters\Http\Actions\Auth\ByPhone\AuthByPhoneConfirmAction;
use App\Adapters\Http\Actions\Dashboard\DashboardAction;
use App\Adapters\Http\Actions\UnitEconomic\UnitEconomicWbAction;
use App\Adapters\Http\Axios\Notifications\GetNotificationsAxios;
use App\Adapters\Http\Axios\Products\GetProductCategoriesAxios;
use App\Adapters\Http\Axios\Products\UploadProductsAxios;
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

Route::delete('auth/sign-out', [AuthSignOutAction::class, 'handle'])
    ->name('auth.sign_out');

// dashboard
Route::get('/', DashboardAction::class)
    ->name('home')
    ->middleware('auth');

// unit economic
Route::get('/unit-economic/wb', [UnitEconomicWbAction::class, 'handle'])->middleware('auth');
Route::get('/unit-economic/ozon', [UnitEconomicWbAction::class, 'handle'])->middleware('auth');
Route::get('/unit-economic/conditions-promotion-wb', [UnitEconomicWbAction::class, 'handle'])->middleware('auth');

// axios
Route::get('/products/get-product-categories', [GetProductCategoriesAxios::class])->middleware('auth');
Route::post('/products/upload-products-file', [UploadProductsAxios::class, 'handle'])->middleware('auth');
Route::get('/dashboard/get-notifications', [GetNotificationsAxios::class, 'handle'])->middleware('auth');
