<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;

Route::get('/dummy', function () {
    return view('dummyPage');
});


Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
// Route::post('/postlogin', [LoginController::class, 'getLoginData'])->name('postlogin');
Route::post('/postlogin', [AuthController::class, 'getLoginData'])->name('postlogin');

Route::middleware(['admin'])->group(function () {

    Route::get('/home', [HomeController::class, 'home']);

    Route::get('/create-client', [ClientController::class, 'newClient'])->name('create-client');

    Route::post('/add-client',[ClientController::class,'addClient'])->name('add-Client');

    Route::get('/clients',[ClientController::class,'clientLists'])->name('clients');

    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/change-password', [AuthController::class, 'changePassword'])->name('change-password');
    Route::patch('/update-password', [AuthController::class, 'updatePassword'])->name('update-password');
  

});


