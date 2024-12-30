<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EventsController;

Route::get('/', function () {
    return view('welcome');
});



Route::get('/dashboard', function () {
    return view('backend.dashboard.index');
});


Route::resource('users', UserController::class);


//
Route::get('/example', [EventsController::class, 'show'])->name('example');


//
