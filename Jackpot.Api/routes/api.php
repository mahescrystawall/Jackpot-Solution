<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BetController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BetApiController;
use App\Http\Controllers\Api\ButtonController;
use App\Http\Controllers\Api\SportsController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\IntCasinoApiController;
use App\Http\Controllers\Api\PriceValueApiController;
use App\Http\Controllers\Api\ProfitLossApiController;
use App\Http\Controllers\Api\Auth\AuthController as APIAuthController;



// Example of a route with authentication
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route for fetching account_statement
Route::post('/report/account-statement', [AccountController::class, 'getStatementData']);

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

Route::post('/login', [APIAuthController::class, 'login']);

// Route for fetching int casino games list
Route::get('/int-casino', [IntCasinoApiController::class, 'getCasinoGames']);

//Unsettled bets- client NEW
Route::post('/getUnsettledBet', [BetApiController::class, 'getUnsettledBet']);

Route::put('/user/status', [UserController::class, 'UpdateUserStaus']);

Route::post('/user/buttons', [UserController::class, 'UpdateButtonValue']);
Route::get('/user-buttons', [ButtonController::class, 'getUserButtons']);


Route::get('/sports-inplay', [SportsController::class, 'getInplayGames']);
// Route::get('/sports-inplay', function () {
//     return response()->json(['test' => 'API is working']);
// });

Route::get('/client-list', [UserController::class, 'getClientList']);
Route::post('/create-bet', [BetController::class, 'createBet']);
Route::post('/settle-bet', [BetController::class, 'settleBet']);
Route::post('create-client-user', [UserController::class, 'createClientUser']);
