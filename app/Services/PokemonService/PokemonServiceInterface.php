<?php

namespace App\Services\PokemonService;

use App\Models\Pokemon;

interface PokemonServiceInterface
{
    function create(int $pokemonID): Pokemon;
}
