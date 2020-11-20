<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
  return view('welcome');
})->name('welcome');
Route::get('time', function () {
  return view('time');
})->name('time');
Route::get('/test', function () {
  return view('test');
});

Route::post('response', [HomeController::class, 'response'])->name('response');

Route::get('liveTest', [DashboardController::class, 'test']);

Route::get('optimize', function () {
  Artisan::call('optimize:clear');
  return view('welcome');
});

Route::get("clear-cache", function () {
  Artisan::call('cache:clear');
  Artisan::call('route:clear');
  Artisan::call('config:clear');
  Artisan::call('view:clear');
});

Auth::routes();

Route::get('/register-real-estate-owner', [RegisterController::class, 'readEstateOwnerRegisterForm'])
  ->name('register.real_estate_owner_form');

Route::post('/register-real-estate-owner/register', [RegisterController::class, 'readEstateOwnerRegister'])
  ->name('register.real_estate_owner');

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/realEstateOwner/dashboard', [HomeController::class, 'realEstateOwnerDashboard'])->name('realEstateOwner.dashboard');
