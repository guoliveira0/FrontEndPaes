<?php

use App\Http\Controllers\HomeController;
use App\Http\Controllers\GameController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'render'])->name('home');
Route::get('/game', [GameController::class, 'render'])->name('game');