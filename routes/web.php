<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
})->middleware('no-logged');

Route::get('/dashboard', [App\Http\Controllers\DashboardController::class, 'index'])->middleware('auth');

Route::prefix('/admin')
    ->middleware(['admin', 'auth'])
    ->group(function () {
        Route::get('/users', [App\Http\Controllers\AdminController::class, 'getUsersView'])
            ->name('users');
        Route::get('/orders', [App\Http\Controllers\AdminController::class, 'getOrdersView'])
            ->name('orders');
    });


Route::prefix('/user')->middleware('auth')->group(function () {
    Route::get('/orders', [App\Http\Controllers\DashboardController::class, 'getOrdersView'])
        ->name('users.orders');
    Route::get('/buy', [App\Http\Controllers\DashboardController::class, 'getBuyView'])
        ->name('users.buy');

});

