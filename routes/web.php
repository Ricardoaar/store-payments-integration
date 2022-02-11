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
})->middleware('no-logged')->name('home');

Route::delete('/orders/{order}', [App\Http\Controllers\OrderController::class, 'destroy'])->name('orders.destroy');


Route::get('/dashboard', [App\Http\Controllers\UserDashboardController::class, 'index'])->middleware('auth');

Route::prefix('/admin')
    ->middleware(['admin', 'auth'])
    ->group(function () {
        Route::get('/users', [App\Http\Controllers\AdminViewsController::class, 'getUsersView'])
            ->name('admin.users');
        Route::get('/orders', [App\Http\Controllers\AdminViewsController::class, 'getOrdersView'])
            ->name('admin.orders');
    });


Route::prefix('/user')
    ->middleware('auth')
    ->group(function () {
        Route::get('/orders', [App\Http\Controllers\UserDashboardController::class, 'getOrdersView'])
            ->name('user.orders');
        Route::get('/buy', [App\Http\Controllers\UserDashboardController::class, 'getBuyView'])
            ->name('user.buy');


        Route::prefix('/payment')->group(function () {
            Route::post('/{gateway}', [App\Http\Controllers\PaymentController::class, 'createPayment'])
                ->name('payment.createPayment');

            Route::post('/{gateway}/{requestId}', [App\Http\Controllers\PaymentController::class, 'checkPayment'])
                ->name('payment.checkPayment');

            Route::post('/{gateway}/retry/{order}', [App\Http\Controllers\PaymentController::class, 'retryPayment'])
                ->name('payment.retry');

        });
    });
