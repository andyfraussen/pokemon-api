<?php

namespace App\Http\Controllers;

use App\Services\PokemonService\PokemonServiceInterface;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PokemonController extends Controller
{
    private PokemonServiceInterface $pokemonService;

    public function __construct(PokemonServiceInterface $pokemonService)
    {
        $this->pokemonService = $pokemonService;
    }

    public function getAll($order = 'id-asc'){
        $content = $this->pokemonService->getAll()->sortBy([
            explode('-', $order)
        ]);

        return $this->apiResponse(Response::HTTP_OK, $content);
    }
}
