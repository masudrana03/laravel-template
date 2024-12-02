<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


use App\Livewire\Counter;

Route::get('/counter', Counter::class);



Route::get('/dashboard', function () {
    return view('backend.dashboard.index');
});


Route::resource('users', UserController::class);
