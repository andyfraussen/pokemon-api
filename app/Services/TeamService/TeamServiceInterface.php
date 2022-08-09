<?php

namespace App\Services\TeamService;

use App\Models\Team;
use Illuminate\Support\Collection;
use phpDocumentor\Reflection\Types\Boolean;

interface TeamServiceInterface
{
    function index(): Collection;
    function create(int $userId, array $teamDTO): Team;
    function show(int $teamId): Team;
    function update(int $userId, int $teamId, array $teamDTO): Team;
    function delete(int $teamId): bool;
}
