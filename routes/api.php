<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CharactersController;
use App\Http\Controllers\TokenController;

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

Route::prefix('tokens')->group(function () {
    Route::post('/create',[TokenController::class, 'createToken'])->name('register');
    Route::post('/login',[TokenController::class, 'login'])->name('login');
});

Route::prefix('v1/public')->middleware('auth:sanctum')->group(function () {
    Route::prefix('characters')->group(function () {
        Route::get('/',[CharactersController::class, 'index'])->name('characters.index');
        Route::get('/{id}',[CharactersController::class, 'show'])->name('characters.show');
        Route::get('/{id}/comics',[CharactersController::class, 'comics'])->name('characters.comics.show');
        Route::get('/{id}/events',[CharactersController::class, 'events'])->name('characters.events.show');
        Route::get('/{id}/series',[CharactersController::class, 'series'])->name('characters.series.show');
        Route::get('/{id}/stories',[CharactersController::class, 'stories'])->name('characters.stories.show');
    });
});
