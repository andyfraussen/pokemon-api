<?php

namespace App\Http\Controllers;

use App\Http\Requests\TeamRequest;
use App\Services\TeamService\TeamServiceInterface;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

use App\Models\User;

class TeamController extends Controller
{
    private TeamServiceInterface $teamService;

    public function __construct(TeamServiceInterface $teamService)
    {
        $this->teamService = $teamService;
    }

    public function index()
    {
        $content = $this->teamService->index();

        return $this->apiResponse(Response::HTTP_OK, $content, 'Successful operation');
    }

    public function create(TeamRequest $request)
    {
//        if (!$user = auth()->user()){
//            return $this->apiResponse(Response::HTTP_NOT_FOUND, null, 'User not authenticated');
//        }
        $user = User::first();

        $content = $this->teamService->create($user->id, $request->all());

        return $this->apiResponse(Response::HTTP_OK, $content, 'Successful operation');
    }

    public function show($id)
    {
        if (!$id){
            return $this->apiResponse(Response::HTTP_NOT_FOUND, null, 'Id not included');
        }

        if (!$content = $this->teamService->show($id)){
            return $this->apiResponse(Response::HTTP_NOT_FOUND, null, 'Team not found');
        }

        return $this->apiResponse(Response::HTTP_OK, $content, 'Successful operation');
    }

    public function update(TeamRequest $request, $teamId)
    {
//        if (!$user = auth()->user()){
//            return $this->apiResponse(Response::HTTP_NOT_FOUND, null, 'User not authenticated');
//        }
        $user = User::first();

        $content = $this->teamService->update($user->id, $teamId, $request->all());

        return $this->apiResponse(Response::HTTP_OK, $content, 'Successful operation');
    }

    public function delete($teamId)
    {
//        if (!$user = auth()->user()){
//            return $this->apiResponse(Response::HTTP_NOT_FOUND, null, 'User not authenticated');
//        }
        $user = User::first();

        if (!$this->teamService->delete($teamId)){
            return $this->apiResponse(Response::HTTP_NOT_FOUND, null, 'Team not found');
        }

        return $this->apiResponse(Response::HTTP_OK, null, 'Successful operation');
    }
}
