<?php

use Illuminate\Support\Facades\Route;

Route::get('/test', function () {

    // return view('admin.notifications.sweetalert');
    return view('livewire.test');
});

Route::get('/', function () {
    return view('welcome');
});

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');
