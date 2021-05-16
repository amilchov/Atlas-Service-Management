<?php

namespace App\Http\Api\Team\Controllers;

use App\Http\Api\Team\Requests\StoreTeamRequest;
use App\Http\Api\Team\Requests\UpdateTeamRequest;
use App\Http\Api\Team\Requests\InviteMemberRequest;
use App\Http\Api\Team\Requests\RemoveMemberRequest;
use App\Http\Api\Team\Requests\AssignIncidentRequest;
use App\Http\Api\Team\Requests\RemoveIncidentRequest;
use App\Http\Api\Team\Requests\AssignRoleRequest;
use App\Http\Api\Team\Requests\RemoveRoleRequest;
use App\Http\Api\Team\Services\TeamService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Exception;
use Illuminate\Http\Request;

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
     * Call the method for user's teams from the service class.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function user(Request $request): JsonResponse
    {
        return $this->teamService->userTeams($request);
    }

    /**
     * Call the method for create a team from the service class.
     *
     * @param StoreTeamRequest $request
     * @return JsonResponse
     */
    public function store(StoreTeamRequest $request): JsonResponse
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
     * Call the method to update a team from the service class.
     *
     * @param int $id
     * @param UpdateTeamRequest $request
     * @return JsonResponse
     */
    public function update(int $id, UpdateTeamRequest $request): JsonResponse
    {
        return $this->teamService->update($id, $request);
    }

    /**
     * Call the method to delete the team from the service class.
     *
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->teamService->delete($id);
    }

    /**
     * Call the method for invite member into team from the service class.
     *
     * @param int $id
     * @param InviteMemberRequest $request
     * @return JsonResponse
     */
    public function inviteMember(int $id, InviteMemberRequest $request): JsonResponse
    {
        return $this->teamService->inviteMember($id, $request);
    }

    /**
     * Call the method for remove member from team from the service class.
     *
     * @param int $id
     * @param RemoveMemberRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function removeMember(int $id, RemoveMemberRequest $request): JsonResponse
    {
        return $this->teamService->removeMember($id, $request);
    }

    /**
     * Call the method for assign an incident to the team from the service class.
     *
     * @param int $id
     * @param AssignIncidentRequest $request
     * @return JsonResponse
     */
    public function assignIncidents(int $id, AssignIncidentRequest $request): JsonResponse
    {
        return $this->teamService->assignIncidents($id, $request);
    }

    /**
     * Call the method for remove incident from team from the service class.
     *
     * @param int $id
     * @param RemoveIncidentRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function removeIncidents(int $id, RemoveIncidentRequest $request): JsonResponse
    {
        return $this->teamService->removeIncidents($id, $request);
    }

    /**
     * Call the method for assign roles into team from the service class.
     *
     * @param int $id
     * @param AssignRoleRequest $request
     * @return JsonResponse
     */
    public function assignRoles(int $id, AssignRoleRequest $request): JsonResponse
    {
        return $this->teamService->assignRoles($id, $request);
    }

    /**
     * Call the method for remove role from team from the service class.
     *
     * @param int $id
     * @param RemoveRoleRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function removeRoles(int $id, RemoveRoleRequest $request): JsonResponse
    {
        return $this->teamService->removeRoles($id, $request);
    }
}
