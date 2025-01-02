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

Route::post('/login', [APIAuthController::class, 'login']);

Route::group(['middleware' => ['auth:sanctum']], function () {

    // AuthController
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
        Route::put('/user/status', 'UpdateUserStaus');
    });

    // ButtonController
    Route::get('/user-buttons', [ButtonController::class, 'getUserButtons']);

    // AccountController
    Route::post('/report/account-statement', [AccountController::class, 'getStatementData']);

    // ProfitLossApiController
    Route::post('/profit-loss', [ProfitLossApiController::class, 'getProfitLoss']);
});
