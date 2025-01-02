<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BetApiController;
use App\Http\Controllers\Api\SportsController;
use App\Http\Controllers\Api\AccountController;
use App\Http\Controllers\Api\MenuApiController;
use App\Http\Controllers\Api\EventApiController;
use App\Http\Controllers\Api\LoginApiController;
use App\Http\Controllers\Api\IntCasinoApiController;
use App\Http\Controllers\Api\PriceValueApiController;
use App\Http\Controllers\Api\ProfitLossApiController;

// Route for fetching int casino games list
Route::get('/int-casino', [IntCasinoApiController::class, 'getCasinoGames']);

// Route::post('/getUnsettledBet', [BetApiController::class, 'getUnsettledBet']);

Route::get('/sports-inplay', [SportsController::class, 'getInplayGames']);

Route::get('/bet_list', [AccountController::class, 'getBetData']);

// Route for fetching stakes value
Route::get('/stakes', [PriceValueApiController::class, 'getStakes']);

// Route for fetching menu items
Route::get('/menu', [MenuApiController::class, 'getMenu']);

Route::get('/events', [EventApiController::class, 'getEvents']);

//Route::get('/profit-loss', [ProfitLossApiController::class, 'getProfitLoss']);

Route::get('/login-data', [LoginApiController::class, 'getLoginData']);


