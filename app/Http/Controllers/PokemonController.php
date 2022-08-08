<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonDetails;
use App\Services\PokemonService\PokemonServiceInterface;
use Illuminate\Http\Request;
use PokePHP\PokeApi;
use function PHPUnit\Framework\stringContains;

class PokemonController extends Controller
{
    private PokemonServiceInterface $pokemonService;

    public function __construct(PokemonServiceInterface $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    public function get(){
        return Pokemon::all();
    }
}
