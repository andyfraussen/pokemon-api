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
    protected $signature = 'import:pokemon {--gen=} {--id=} {--name=}';

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
        $api = new PokeApi;

        if ($gen = $this->options()['gen']) {
            $gen = env('GENERATION_' . $gen);
            for ($start = intval(explode('-', $gen)[0]); $start <= $end = intval(explode('-', $gen)[1]); $start++) {
                $data = json_decode($api->pokemon($start));
                $this->pokemonService->create($data);
            }
        } elseif ($this->options()['id']) {
            $data = json_decode($api->pokemon($this->options()['id']));
            $this->pokemonService->create($data);
        } elseif ($this->options()['name']){
            $data = json_decode($api->pokemon($this->options()['name']));
        }

        return 'import complete';
    }
}
