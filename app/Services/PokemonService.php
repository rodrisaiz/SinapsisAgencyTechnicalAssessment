<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use App\Models\Pokemon;

class PokemonService
{
    public function getLastTenPokemons()
    {
        $currentSessionId = session()->getId();

        $pokemons = Pokemon::where('session_id', $currentSessionId)
                            ->orderBy('created_at', 'desc')
                            ->take(10)
                            ->get(['name', 'abilities']);

        return $pokemons->map(function ($pokemon) {
            return [
                'name' => $pokemon->name,
                'abilities' => json_decode($pokemon->abilities, true), 
            ];
        });
    }

    public function getPokemonData($id)
    {
        $response = Http::get("https://pokeapi.co/api/v2/pokemon/{$id}");

        if ($response->failed()) {
            return null; 
        }

        $data = $response->json();
        $name = $data['forms'][0]['name'];

        $abilities = $this->getAbilities($data['abilities']);

        return [
            'name' => $name,
            'abilities' => $abilities,
        ];
    }

    public function savePokemon($pokemonData)
    {
        $session_id = session()->getId();

        Pokemon::create([
            'name' => $pokemonData['name'],
            'abilities' => json_encode($pokemonData['abilities']),
            'session_id' => $session_id,
        ]);
    }

    private function getAbilities($abilities)
    {
        $allAbilities = array_map(function ($ability) {
            return $ability['ability']['url'];
        }, $abilities);

        return array_map(function ($specificAbility) {
            $response = Http::get($specificAbility);
            $data = $response->json();
            return $this->getAbilityNameInSpanish($data);
        }, $allAbilities);
    }

    private function getAbilityNameInSpanish($abilityData)
    {
        foreach ($abilityData['names'] as $name) {
            if ($name['language']['name'] === 'es') {
                return $name['name'];
            }
        }

        return null; 
    }
}
