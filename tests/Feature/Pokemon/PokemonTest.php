<?php

namespace Tests\Feature\Pokemon;

use Tests\TestCase;

class PokemonTest extends TestCase
{
    public function test_pokemon_index(){
        $response = $this->get('api/v1/pokemons');

        $response->assertStatus(200);
    }

    public function test_pokemon_show()
    {
        $response = $this->get('api/v1/pokemons/1');

        $response->assertStatus(200);
    }
}
