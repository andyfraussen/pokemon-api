<?php

namespace Tests\Feature\Teams;

use App\Models\User;
use App\Models\UserTeam;
use Tests\TestCase;

class TeamCRUDTest extends TestCase
{
    public function test_user_team_index(){
        $response = $this->get('api/v1/teams');

        $response->assertStatus(200);
    }
    public function test_user_team_registration()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $response = $this->post('api/v1/teams', [
            'name' => 'Test Team',
            'pokemons' => [1,2,3,4,5]
        ]);

        $response->assertStatus(200);
    }
    public function test_user_team_show()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->post('api/v1/teams', [
            'name' => 'Test Team',
            'pokemons' => [1,2,3,4,5]
        ]);

        $teamId = UserTeam::firstWhere('user_id', $user->id)->team_id;

        $response = $this->get('api/v1/teams/'. $teamId);

        $response->assertStatus(200);
    }
    public function test_user_team_update()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->post('api/v1/teams', [
            'name' => 'Test Team',
            'pokemons' => [1,2,3,4,5]
        ]);

        $teamId = UserTeam::firstWhere('user_id', $user->id)->team_id;

        $response = $this->put('api/v1/teams/'. $teamId, [
            'name' => 'Test Team',
            'pokemons' => [1,2,3,4,5]
        ]);

        $response->assertStatus(200);
    }
    public function test_user_team_delete()
    {
        $user = User::factory()->create();

        $this->actingAs($user);

        $this->post('api/v1/teams', [
            'name' => 'Test Team',
            'pokemons' => [1,2,3,4,5]
        ]);

        $teamId = UserTeam::firstWhere('user_id', $user->id)->team_id;

        $response = $this->delete('api/v1/teams/'. $teamId);

        $response->assertStatus(200);
    }
}
