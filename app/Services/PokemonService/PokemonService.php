<?php

namespace App\Services\PokemonService;

use App\Models\Pokemon;

class PokemonService implements PokemonServiceInterface
{

    public function create(object $pokemonDTO): Pokemon
    {
        $pokemon = Pokemon::updateOrCreate([
            'pokemon_id' => $pokemonDTO->id,
            'name' => $pokemonDTO->name,
            'sprites' => json_encode($pokemonDTO->sprites),
            'types' => json_encode($pokemonDTO->types),
        ]);

        $pokemon->details()->updateOrCreate([
            'name' => $pokemonDTO->name,
            'sprites' => json_encode($pokemonDTO->sprites),
            'types' => json_encode($pokemonDTO->types),
            'height' => $pokemonDTO->height,
        ]);

        return $pokemon;
    }
}
