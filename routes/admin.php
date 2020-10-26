<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Livewire\Admin\Employees;
use App\Http\Livewire\Admin\Roles;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('/login', [AuthController::class, 'getLoginForm'])->name('loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('seedAdmins', [AuthController::class, 'seedAdmins']);
});

Route::group(['middleware' => ['auth:admin', 'session_expire']], function () {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resources([
        'admins' => AdminController::class,
        'permissions' => PermissionController::class,
        'users' => UserController::class,
    ]);
    Route::get('/employees', Employees::class)->middleware('permission:view_employees')->name('employees.index');
    Route::get('/roles', Roles::class)->name('roles.index');
    // ? *************************** Permissions **********************************************
    Route::group(['middleware' => ['permission:delete']], function () {
        Route::get('/dashboard/delete', [DashboardController::class, 'delete'])->name('dashboard.delete');
    });
    // ***************************** Destroy routes *******************************************
    Route::get('admins/{admin}', [AdminController::class, 'destroy'])->name('admins.destroy');
    // ******************* End Destroy routes *******************  
    Route::get('/not_found', [DashboardController::class, 'notFound'])->name('404');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
