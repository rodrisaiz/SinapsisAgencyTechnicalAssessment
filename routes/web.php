<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;


Route::get('/', [PokemonController::class, 'index']);
Route::get('/pokemon/{id}', [PokemonController::class, 'getPokemon']);

