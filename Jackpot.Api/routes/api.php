<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BetController;
use App\Http\Controllers\Api\UserController;
use App\Http\Controllers\Api\BetApiController;
use App\Http\Controllers\Api\ButtonController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\Auth\AuthController;
use App\Http\Controllers\Api\ProfitLossApiController;
use App\Http\Controllers\Api\Auth\AuthController as APIAuthController;
use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\PriceValueApiController;
use Illuminate\Http\Request;

// Example of a route with authentication
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Route for fetching account_statement


// Route for fetching bet_list
Route::get('/bet_list', [AccountController::class, 'getBetData']);


// Route for fetching stakes value
Route::get('/stakes', [PriceValueApiController::class, 'getStakes']);



Route::get('/events', [EventApiController::class, 'getEvents']);

//Route::get('/profit-loss', [ProfitLossApiController::class, 'getProfitLoss']);




Route::get('/login-data', [LoginApiController::class, 'getLoginData']);


Route::post('/login', [APIAuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    // Client

    Route::post('/getUnsettledBet',  [BetApiController::class, 'getUnsettledBet']);
  Route::post('/create-bet', [BetController::class, 'createBet']);
Route::post('/settle-bet', [BetController::class, 'settleBet']);



Route::post('/create-bet', [BetController::class, 'createBet']);

    // Route::group(['controller' => BetApiController::class], function () {
    //     //Unsettled bets- client NEW

    // });
    // AuthController

    Route::post('/getUnsettledBet',  [BetApiController::class, 'getUnsettledBet']);

    Route::post('/create-bet', [BetController::class, 'createBet']);
    Route::post('/settle-bet', [BetController::class, 'settleBet']);
    Route::post('create-client-user', [UserController::class, 'createClientUser']);
    Route::post('/report/account-statement', [AccountController::class, 'getStatementData']);
    Route::post('/bet_history', [BetApiController::class, 'getBetHistory']);
    Route::post('/profit-loss', [ProfitLossApiController::class, 'getProfitLoss']);
    Route::post('/settle-bet', [BetController::class, 'settleBet']);
    Route::post('create-client-user', [UserController::class, 'createClientUser']);
    Route::get('/client-list', [UserController::class, 'getClientList']);
    Route::get('/menu', [MenuApiController::class, 'getMenu']);

    // Route::group(['controller' => BetApiController::class], function () {
    //     //Unsettled bets- client NEW

    // });
    Route::group(['controller' => AuthController::class], function () {
        Route::patch('/updatePassword', 'updatePassword');
        Route::post('/logout', 'logout');
    });

    // BetApiController
    Route::group(['controller' => BetApiController::class], function () {
        Route::post('/getUnsettledBet', 'getUnsettledBet');
        Route::post('/bet_history', 'getBetHistory');
    });

    // BetController
    Route::group(['controller' => BetController::class], function () {
        Route::post('/create-bet', 'createBet');
        Route::post('/settle-bet', 'settleBet');
    });

    // UserController
    Route::group(['controller' => UserController::class], function () {
        Route::post('create-client-user', 'createClientUser');
        Route::get('/client-list', 'getClientList');
        Route::post('/user/buttons', 'UpdateButtonValue');
        Route::post('/reset-user-password', 'resetPassword');
        Route::put('/user/status', 'UpdateUserStaus');
        Route::post('/get_blocked_clients', 'getBlockedClients');
    });

    // ButtonController
    Route::get('/user-buttons', [ButtonController::class, 'getUserButtons']);

    // AccountController
    Route::post('/report/account-statement', [AccountController::class, 'getStatementData']);

    // ProfitLossApiController
    Route::post('/profit-loss', [ProfitLossApiController::class, 'getProfitLoss']);


});
