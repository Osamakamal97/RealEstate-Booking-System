<?php

use App\Http\Livewire\Test;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    // return view('admin.notifications.sweetalert');
    return view('livewire.test');
});
// Route::livewire('/', Test::class);

// Route::get('cache-clear', function () {
//     Artisan::call('optimize:clear');
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');