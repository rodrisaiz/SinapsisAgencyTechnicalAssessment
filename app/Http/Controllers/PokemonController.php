<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\PokemonService;
use App\Models\Pokemon;

use Inertia\Inertia;

class PokemonController extends Controller
{
    protected $pokemonService;

    public function __construct(PokemonService $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    public function index()
    {
        $lastTenPokemons = $this->pokemonService->getLastTenPokemons();
        
        dd($lastTenPokemons);

    }

    public function getPokemon($id)
    {
        $pokemonData = $this->pokemonService->getPokemonData($id);
        
        $this->pokemonService->savePokemon($pokemonData);
    }
}
