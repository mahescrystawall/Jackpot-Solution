<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BetController;
use App\Http\Controllers\Api\PriceValueController;
use App\Http\Controllers\Api\MenuController;
use App\Http\Controllers\Api\EventController;
use App\Http\Controllers\Api\ProfitLossController;
use App\Http\Controllers\Api\LoginController;
use App\Http\Controllers\Api\AccountController;
;


// Example of a route with authentication
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route for fetching unsettled bets
Route::get('/unsettled_bets', [BetController::class, 'getUnsettledBets'])->name('unsettled_bets');

// Route for fetching account_statement
Route::get('/report/account-statement', [AccountController::class, 'getStatementData']);

// Route for fetching bet_list
Route::get('/bet_list', [AccountController::class, 'getBetData']);


// Route for fetching stakes value
Route::get('/stakes', [PriceValueController::class, 'getStakes']);

// Route for fetching menu items
Route::get('/menu', [MenuController::class, 'getMenu']);

Route::get('/events', [EventController::class, 'getEvents']);

Route::get('/profit-loss', [ProfitLossController::class, 'getProfitLoss']);

Route::get('/bet_history', [BetController::class, 'getBetHistory']);

Route::get('/login-data', [LoginController::class, 'getLoginData']);

