<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Applications\Api\Http\Controllers\DiceController;
use App\Applications\Api\Http\Controllers\MonsterController;

Route::get('/roll/{jogada}', [DiceController ::class, 'roll'])->name('dice.roll');

Route::get('/monsters', [MonsterController ::class, 'index'])->name('monster.index');
