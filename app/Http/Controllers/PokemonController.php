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

    public function getAll(Request $request){
        $order = $request->order ? $request->order : 'id-asc';

        $content = $this->pokemonService->getAll()->sortBy([
            explode('-', $order)
        ]);

        return $this->apiResponse(Response::HTTP_OK, $content, 'Successful operation');
    }

    public function getPokemon($id){
        if (!$id){
            return $this->apiResponse(Response::HTTP_NOT_FOUND, null, 'Pokemon not found');
        }

        if (!$content = $this->pokemonService->getPokemon($id)){
            return $this->apiResponse(Response::HTTP_NOT_FOUND, null, 'Pokemon not found');
        }

        return $this->apiResponse(Response::HTTP_OK, $content, 'Successful operation');
    }
}
