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
use App\Http\Controllers\Api\IntCasinoApiController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\SportsController;


// Example of a route with authentication
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route for fetching unsettled bets
Route::get('/unsettled_bets', [BetApiController::class, 'getUnsettledBets'])->name('unsettled_bets');

// Route for fetching account_statement
Route::get('/report/account-statement', [AccountController::class, 'getStatementData']);

// Route for fetching bet_list
Route::get('/bet_list', [AccountController::class, 'getBetData']);


// Route for fetching stakes value
Route::get('/stakes', [PriceValueApiController::class, 'getStakes']);

// Route for fetching menu items
Route::get('/menu', [MenuApiController::class, 'getMenu']);

Route::get('/events', [EventApiController::class, 'getEvents']);

//Route::get('/profit-loss', [ProfitLossApiController::class, 'getProfitLoss']);

Route::post('/profit-loss', [ProfitLossApiController::class, 'getProfitLoss']);


Route::post('/bet_history', [BetApiController::class, 'getBetHistory']);

Route::get('/login-data', [LoginApiController::class, 'getLoginData']);

// Route for fetching int casino games list
Route::get('/int-casino', [IntCasinoApiController::class, 'getCasinoGames']);


Route::put('/user/status', [UserController::class, 'toggleUserFeature']);

Route::post('/user/buttons', [UserController::class, 'UpdateButtonValue']);

 Route::get('/sports-inplay', [SportsController::class, 'getInplayGames']);
// Route::get('/sports-inplay', function () {
//     return response()->json(['test' => 'API is working']);
// });


