<?php

use App\Http\Controllers\v1\DiceController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/roll/{jogada}', [DiceController::class, 'roll'])->name('dice.roll');
