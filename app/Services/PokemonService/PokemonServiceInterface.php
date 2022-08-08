<?php

namespace App\Services\PokemonService;

use App\Models\Pokemon;
use Illuminate\Support\Collection;

interface PokemonServiceInterface
{
    function create(int $pokemonID): Pokemon;
    function getAll(): Collection;
}
