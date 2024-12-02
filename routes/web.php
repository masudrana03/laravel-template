<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});


use App\Livewire\Counter;
use App\Livewire\Home;

Route::get('/counter', Counter::class);
Route::get('/home', Home::class);



Route::get('/dashboard', function () {
    return view('backend.dashboard.index');
});


Route::resource('users', UserController::class);
