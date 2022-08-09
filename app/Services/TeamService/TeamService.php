<?php

namespace App\Services\TeamService;

use App\Models\Pokemon;
use App\Models\Team;
use App\Models\UserTeam;
use Illuminate\Support\Collection;


class TeamService implements TeamServiceInterface
{
    public function index(): Collection
    {
        return Team::all();
    }

    public function create(int $userId, array $teamDTO): Team
    {
        $team = Team::create([
            'name' => $teamDTO['name'],
            'pokemons' => array_map(function ($id) {
                if ($pokemon = Pokemon::firstWhere('pokemon_id', $id))
                    return $pokemon;
            }, $teamDTO['pokemons'])
        ]);

        UserTeam::create([
            'user_id' => $userId,
            'team_id' => $team->id
        ]);

        return $team;
    }

    function show(int $teamId): Team
    {
        return Team::firstWhere('id', $teamId);
    }

    function update(int $userId, int $teamId, array $teamDTO): Team
    {
        $team = Team::firstWhere('id', $teamId);

        $team->update([
            'name' => $teamDTO['name'],
            'pokemon' => $teamDTO['pokemons']
        ]);

        return $team;
    }

    function delete(int $teamId): bool
    {
        $team = Team::firstWhere('id', $teamId);
        if (!$team) {
            return false;
        }
        return $team->delete();
    }
}
