<?php

namespace App\Http\Api\Team\Controllers;

use App\Http\Api\Team\Requests\AssignRequest;
use App\Http\Api\Team\Requests\InviteRequest;
use App\Http\Api\Team\Requests\StoreRequest;
use App\Http\Api\Team\Requests\UpdateRequest;
use App\Http\Api\Team\Services\TeamService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Team Controller
|--------------------------------------------------------------------------
|
| This class is a type of controller, in which we have
| the basic team data from the Team Service.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class TeamController extends Controller
{
    /**
     * Initializing the instance of Team Service class.
     *
     * @var TeamService
     */
    private TeamService $teamService;

    /**
     * TeamController constructor.
     *
     * @param TeamService $teamService
     */
    public function __construct(TeamService $teamService)
    {
        $this->teamService = $teamService;
    }

    /**
     * Call the method for all teams from the service class.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->teamService->all();
    }

    /**
     * Call the method for create a team from the service class.
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function store(StoreRequest $request): JsonResponse
    {
        return $this->teamService->create($request);
    }

    /**
     * Call the method for show the team from the service class.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->teamService->show($id);
    }

    /**
     * Call the method for update a team from the service class.
     *
     * @param int $id
     * @param UpdateRequest $request
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request): JsonResponse
    {
        return $this->teamService->update($id, $request);
    }

    /**
     * Call the method for update a team from the service class.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->teamService->delete($id);
    }

    /**
     * Call the method for invite member into team from the service class.
     *
     * @param InviteRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function invite(InviteRequest $request, int $id): JsonResponse
    {
        return $this->teamService->invite($request, $id);
    }

    /**
     * Call the method for assign roles into team from the service class.
     *
     * @param AssignRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function roles(AssignRequest $request, int $id): JsonResponse
    {
        return $this->teamService->assignRoles($request, $id);
    }
}
