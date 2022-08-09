<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('v1')->group(function () {
    Route::get('/pokemons', [\App\Http\Controllers\PokemonController::class, 'index']);
    Route::get('/pokemons/{id}', [\App\Http\Controllers\PokemonController::class, 'show']);

    Route::get('/teams', [\App\Http\Controllers\TeamController::class, 'index']);

    Route::post('/teams', [\App\Http\Controllers\TeamController::class, 'create']);
    Route::put('/teams/{id}', [\App\Http\Controllers\PokemonController::class, 'update']);
    Route::get('/teams/{id}', [\App\Http\Controllers\PokemonController::class, 'show']);
    Route::delete('/teams/{id}', [\App\Http\Controllers\PokemonController::class, 'delete']);
});
