<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BetApiController;
use App\Http\Controllers\Api\PriceValueApiController;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\ProfitLossApiController;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\AccountController;

// Example of a route with authentication
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route for fetching unsettled bets
Route::get('/unsettled_bets', [BetApiController::class, 'getUnsettledBets'])->name('unsettled_bets');

// Route for fetching account_statement
Route::post('/report/account-statement', [AccountController::class, 'getStatementData']);

// Route for fetching bet_list
Route::post('/bet_list', [AccountController::class, 'getBetData']);

// Route for fetching bet_list
Route::post('/order_history', [AccountController::class, 'getBetHistoryData']);

// Route for fetching stakes value
Route::get('/stakes', [PriceValueApiController::class, 'getStakes']);

// Route for fetching menu items
Route::get('/menu', [MenuApiController::class, 'getMenu']);

Route::get('/events', [EventApiController::class, 'getEvents']);

Route::get('/report/profit-loss', [ProfitLossApiController::class, 'getProfitLoss']);

Route::post('/bet_history', [BetApiController::class, 'getBetHistory']);

Route::get('/login-data', [LoginApiController::class, 'getLoginData']);

