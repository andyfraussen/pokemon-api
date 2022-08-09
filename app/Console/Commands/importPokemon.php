<?php

namespace App\Console\Commands;

use App\Models\Pokemon;
use App\Services\PokemonService\PokemonServiceInterface;
use Illuminate\Console\Command;
use PokePHP\PokeApi;

class importPokemon extends Command
{
    private PokemonServiceInterface $pokemonService;

    public function __construct(PokemonServiceInterface $pokemonService)
    {
        parent::__construct();
        $this->pokemonService = $pokemonService;
    }

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'import:pokemon {--gen=} {--id=} {--name=} {--file}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Import pokemon based on generation or id';

    /**
     * Execute the console command.
     *
     * @return string
     */
    public function handle()
    {
        if ($gen = $this->options()['gen']) {
            $gen = env('GENERATION_' . $gen);
            for ($start = intval(explode('-', $gen)[0]); $start <= $end = intval(explode('-', $gen)[1]); $start++) {
                $this->pokemonService->create($start);
            }

        } elseif ($this->options()['id']) {
            $this->pokemonService->create(intval($this->options()['id']));
        } elseif ($this->options()['name']) {
            $api = new PokeApi;
            $id = json_decode($api->pokemon($this->options()['name']))->id;
            $this->pokemonService->create($id);
        } elseif ($this->options()['file']) {
            $data = json_decode(file_get_contents(base_path() . "/pokemons.json"));
            foreach  ($data as $d){
                $this->pokemonService->create($d->id);
                // todo: create service without api call
            }
        }
    }
}
