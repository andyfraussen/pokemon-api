<?php

namespace App\Services\PokemonService;

use App\Models\Pokemon;
use App\Models\PokemonDetails;
use Illuminate\Support\Collection;

interface PokemonServiceInterface
{
    function index(): Collection;
    function create(int $pokemonID): Pokemon;
    function show(int $pokemonID): PokemonDetails;
}
