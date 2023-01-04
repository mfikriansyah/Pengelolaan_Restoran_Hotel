<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HidanganController;

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
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', 'index')->name('login');
    Route::post('/login', 'authenticate')->name('authenticate');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['admin'])->group(function () {
    Route::prefix('dashboard')->group(function () {
            Route::controller(DashboardController::class)->group(function () {
                Route::get('/', 'index')->name('dashboard.index');
            });
        });
});
Route::middleware(['admin'])->group(function () {
    Route::controller(HidanganController::class)->group(function () {
        Route::get('/hidangan', 'index')->name('dashboard.hidangan');
        Route::post('/hidangan/store', 'store')->name('dashboard.hidangan.store');
        Route::get('/hidangan/edit/{id}', 'edit')->name('dashboard.hidangan.edit');
        Route::patch('/hidangan/update', 'update')->name('dashboard.hidangan.update');
        Route::delete('/hidangan/delete/{id}', 'delete')->name('dashboard.hidangan.delete');
    });
});
