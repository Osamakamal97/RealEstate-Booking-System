<?php

use App\Http\Controllers\Admin\AuthController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Livewire\Admin\Employees;
use Illuminate\Support\Facades\Route;

Route::group(['middleware' => 'guest:admin'], function () {
    Route::get('/login', [AuthController::class, 'getLoginForm'])->name('loginForm');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::get('seedAdmins', [AuthController::class, 'seedAdmins']);
});

Route::group(['middleware' => ['auth:admin', 'session_expire']], function () {
    Route::get('dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('admins', [DashboardController::class, 'admins'])->middleware('role:super-admin')->name('admins.index');
    Route::get('permissions', [DashboardController::class, 'permissions'])->middleware('role:super-admin')->name('permissions.index');
    Route::get('users', [DashboardController::class, 'users'])->middleware('can:view_users')->name('users.index');
    Route::get('real-estates', [DashboardController::class, 'realEstates'])->middleware('can:view_real_estates')->name('realEstates.index');
    Route::get('real-estate-owners', [DashboardController::class, 'realEstateOwners'])->middleware('can:view_real_estate_owners')->name('realEstateOwners.index');
    Route::get('users/notify', [DashboardController::class, 'notifyUsers'])->middleware('can:notify_users')->name('users.notify.index');
    Route::get('users/notifications-response', [DashboardController::class, 'usersResponse'])->middleware('can:view_users_notifications')->name('users.notifications.index');
    Route::get('employees', Employees::class)->middleware('permission:view_employees')->name('employees.index');
    Route::get('roles', [DashboardController::class, 'roles'])->name('roles.index');
    Route::get('profile', [DashboardController::class, 'profile'])->name('profile.index');
    Route::get('employee/problems', [DashboardController::class, 'employeeProblem'])->name('employee.problems.send');
    Route::get('real-estate/facilities', [DashboardController::class, 'realEstateFacilities'])->name('realEstate.facilities');
    Route::get('employee-problems/index', [DashboardController::class, 'employeeProblemsIndex'])->name('employee.problems.index');
    Route::get('/not_found', [DashboardController::class, 'notFound'])->name('404');
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
});
