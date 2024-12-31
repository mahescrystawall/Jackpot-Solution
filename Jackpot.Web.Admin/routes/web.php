<?php

use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/dummy', function () {
    return view('dummyPage');
});


Route::get('/home', [HomeController::class, 'home']);

Route::get('/create-client', [ClientController::class, 'newClient']);
