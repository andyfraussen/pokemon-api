<?php

namespace App\Services\PokemonService;

use App\Models\Pokemon;
use App\Models\PokemonDetails;
use PokePHP\PokeApi;
use Illuminate\Support\Collection;

class PokemonService implements PokemonServiceInterface
{
    private PokeApi $pokeApi;

    public function __construct(PokeApi $pokeApi){
        $this->pokeApi = new PokeApi();
    }

    public function create(int $pokemonID): Pokemon
    {
        $data = json_decode($this->pokeApi->pokemon($pokemonID));

        $pokemon = Pokemon::updateOrCreate([
            'pokemon_id' => $data->id,
            'name' => $data->name,
            'sprites' => json_encode($data->sprites),
            'types' => json_encode($data->types),
        ]);

        $pokemon->details()->updateOrCreate([
            'name' => $data->name,
            'sprites' => json_encode($data->sprites),
            'types' => json_encode($data->types),
            'height' => $data->height,
            'weight' => $data->weight,
            'moves'=> json_encode($data->moves),
            'order'=> $data->order,
            'species'=> $this->pokeApi->pokemonSpecies($data->id),
            'stats'=> json_encode($data->stats),
            'abilities'=> json_encode($data->abilities),
            'form' => $this->pokeApi->pokemonForm($data->id),
        ]);

        return $pokemon;
    }

    public function index(): Collection
    {
        return Pokemon::all();
    }

    public function show(int $pokemonID): PokemonDetails
    {
        return PokemonDetails::firstWhere('pokemon_id', $pokemonID);
    }
}
