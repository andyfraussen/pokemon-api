<?php

namespace App\Http\Controllers;

use App\Models\Pokemon;
use App\Models\PokemonDetails;
use Illuminate\Http\Request;
use PokePHP\PokeApi;
use function PHPUnit\Framework\stringContains;

class PokemonController extends Controller
{
    public function test(){
        return Pokemon::all();
    }
}
