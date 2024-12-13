<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\DashboardController;

use App\Http\Controllers\User\BetHistoryController;
use App\Http\Controllers\User\StakeController;
use App\Http\Controllers\User\UnsettledBetController;

Route::get('/', [LoginController::class, 'showLoginForm']);
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/postlogin', [LoginController::class, 'getLoginData'])->name('postlogin');
Route::middleware(['client'])->group(function () {
    Route::resource('/home', DashboardController::class);

    Route::get('/bet-history', [BetHistoryController::class,'index'])->name('bet-history');
    Route::get('/unsettled_bets', [UnsettledBetController::class,'index'])->name('unsettled_bets');
    Route::get('/change-price-value', [StakeController::class,'showForm'])->name('change-price-value');
    Route::post('/stakes/update', [StakeController::class, 'updateStakeValue'])->name('stakes.update');

    Route::get('/logout', [LoginController::class, 'logout'])->name('logout');
});
