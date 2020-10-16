<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
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

Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('/login', [AuthController::class, 'getLoginForm'])->name('loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
});

Route::group(['middleware' => 'auth:admin'], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'admins' => AdminController::class,
    ]);
    // ******************* Destroy routes *******************
    Route::get('admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');
    // ******************* End Destroy routes *******************  
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
