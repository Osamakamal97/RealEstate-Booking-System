<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\Permissions;
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
    Route::get('seedAdmins', [AuthController::class, 'seedAdmins']);
});

Route::group(['middleware' => ['auth:admin']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'admins' => AdminController::class,
        'permissions' => PermissionController::class,
        'users' => UserController::class,
    ]);
    // ? *************************** Permissions **********************************************
    Route::group(['middleware' => ['permission:delete']], function () {
        Route::get('/dashboard/delete', [DashboardController::class, 'delete'])->name('dashboard.delete');
    });
    // ***************************** Destroy routes *******************************************
    Route::get('admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');
    // ******************* End Destroy routes *******************  
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
