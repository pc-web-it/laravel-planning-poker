<?php

use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\PokerController;
use App\Http\Middleware\ClearParticipants;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\GameController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/new-game', [GameController::class, 'newGame'])->name('new-game');
Route::get('/start-new-game/{link}', [GameController::class, 'startNewGame'])->name('start-new-game');
Route::get('/join-existing-game/{code?}', [GameController::class, 'joinExistingGame'])->name('join-existing-game');
Route::post('/join', [GameController::class, 'join'])->name('join');
Route::get('/game/{link}', [GameController::class, 'game'])->name('game');


Route::post('/select-card', [PokerController::class, 'selectCard'])->name('select-card');
