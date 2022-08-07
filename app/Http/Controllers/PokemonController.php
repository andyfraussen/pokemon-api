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
        $api = new PokeApi;
        $data = json_decode($api->pokemon(1));

        $pokemon = Pokemon::where('name', $data->name)->first();

        if ($pokemon === null){
            $pokemon = new Pokemon();
            $pokemon->id = $data->id;
            $pokemon->name = $data->name;
            $pokemon->sprites = json_encode($data->sprites);
            $pokemon->types = json_encode($data->types);
            $pokemon->save();
            $pokemon->details()->create([
                'name' =>$data->name,
                'sprites' => json_encode($data->sprites),
                'types' => json_encode($data->types),
                'height' => $data->height,
            ]);
            dd($pokemon);
        } else {
            dd(Pokemon::first()->details);
        }

    }
}
