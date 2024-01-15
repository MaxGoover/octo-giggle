<?php

use App\Http\Controllers\TodoController;
use Illuminate\Support\Facades\Route;
// use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return Inertia('Todo/Todo'); // название в скобках должно совпадать с названием компонента.vue, к которому он обращается
// });

// Route::group(['namespace' => 'auth'], function () {
//     Route::get('sign-in', 'AuthController');
// });

Route::resource('todos', TodoController::class);
