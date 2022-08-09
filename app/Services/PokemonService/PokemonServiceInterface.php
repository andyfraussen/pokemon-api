<?php

namespace App\Services\PokemonService;

use App\Models\Pokemon;
use App\Models\PokemonDetails;
use Illuminate\Support\Collection;

interface PokemonServiceInterface
{
    function create(int $pokemonID): Pokemon;
    function index(): Collection;
    function show(int $pokemonID): PokemonDetails;
}
