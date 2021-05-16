<?php

namespace App\Http\Api\Team\Services;

use App\Http\Api\Incident\Models\Executing;
use App\Http\Api\Role\Models\ModelHasRoles;
use App\Http\Api\Team\Models\Membership;
use App\Http\Api\Team\Models\Incidentship;
use App\Http\Api\Team\Models\Roleship;
use App\Http\Api\Team\Requests\StoreTeamRequest;
use App\Http\Api\Team\Requests\UpdateTeamRequest;
use App\Http\Api\Team\Requests\InviteMemberRequest;
use App\Http\Api\Team\Requests\RemoveMemberRequest;
use App\Http\Api\Team\Requests\AssignIncidentRequest;
use App\Http\Api\Team\Requests\RemoveIncidentRequest;
use App\Http\Api\Team\Requests\AssignRoleRequest;
use App\Http\Api\Team\Requests\RemoveRoleRequest;
use App\Http\Api\Team\Resources\Collections\TeamCollection;
use App\Http\Api\Team\Resources\TeamResource;
use App\Http\Api\Team\Models\Team;
use App\Http\Api\User\Models\User;
use App\Http\Api\Team\Interfaces\TeamRepositoryInterface;
use App\Http\Api\User\Interfaces\UserRepositoryInterface;
use App\Http\Api\Incident\Interfaces\IncidentRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Exception;

/**
|--------------------------------------------------------------------------
| Team Service
|--------------------------------------------------------------------------
|
| This class is a type of service, in which we are
| getting the full data about team stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class TeamService
{
    /**
     * Initializing the instance of User class.
     *
     * @var string
     */
    private string $userClass = User::class;

    /**
     * Initializing the instance of Team class.
     *
     * @var string
     */
    private string $teamClass = Team::class;

    /**
     * Initializing the instance of Team Repository interface.
     *
     * @var TeamRepositoryInterface
     */
    private TeamRepositoryInterface $teamRepository;

    /**
     * Initializing the instance of User Repository interface.
     *
     * @var UserRepositoryInterface
     */
    private UserRepositoryInterface $userRepository;

    /**
     * Initializing the instance of Incident Repository interface.
     *
     * @var IncidentRepositoryInterface
     */
    private IncidentRepositoryInterface $incidentRepository;

    /**
     * TeamService constructor.
     *
     * @param TeamRepositoryInterface $teamRepository
     * @param UserRepositoryInterface $userRepository
     * @param IncidentRepositoryInterface $incidentRepository
     */
    public function __construct(
        TeamRepositoryInterface $teamRepository,
        UserRepositoryInterface $userRepository,
        IncidentRepositoryInterface $incidentRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->userRepository = $userRepository;
        $this->incidentRepository = $incidentRepository;
    }

    /**
     * Call the method for get all teams from the repository class.
     *
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        $teams = $this->teamRepository->all();

        return response()->json(new TeamCollection($teams));
    }

    /**
     * Call the method for finding the user by token, then get all teams attached to him.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function userTeams(Request $request): JsonResponse
    {
        $user = $this->userRepository->findByToken($request);

        $teams = $user->teams()->get();

        return response()->json(['teams' => TeamResource::collection($teams)]);
    }

    /**
     * Create the team with the desired data.
     *
     * @param StoreTeamRequest $request
     * @return JsonResponse
     */
    public function create(StoreTeamRequest $request): JsonResponse
    {
        $user = $this->userRepository->findByToken($request);

        $validated = $request->validated();

        $team = Team::create([
            'owner_id' => $user->id,
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $validated['image'] ?? Team::DEFAULT_PICTURE
        ]);

        $team->checkForPicture($request, 'image', 'teams', $team);

        $user->teams()->attach($team);

        $this->attachRole($request, $team, $user);

        return response()->json(new TeamResource($team));
    }

    /**
     * Show the team with the specific id.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $team = $this->teamRepository->findAllRoles($id);

        return response()->json(new TeamResource($team));
    }

    /**
     * Update the team with the desired data.
     *
     * @param int $id
     * @param UpdateTeamRequest $request
     * @return JsonResponse
     */
    public function update(int $id, UpdateTeamRequest $request): JsonResponse
    {
        $team = $this->teamRepository->findById($id);

        $team->deletePicture($this->teamClass, $team, 'image');

        $team->update($request->validated());

        $team->checkForPicture($request, 'image', 'teams', $team);

        return response()->json(new TeamResource($team));
    }

    /**
     * Delete the team with the desired data.
     *
     * @param int $id
     * @return JsonResponse
     * @throws Exception
     */
    public function delete(int $id): JsonResponse
    {
        $team = $this->teamRepository->findById($id);

        $team->deletePicture($this->teamClass, $team, 'image');

        $team->removeRelations($id);

        $team->delete();

        return response()->json(['message' => 'The team was successfully deleted.']);
    }

    /**
     * Invite user/users with role/roles to the desired team.
     *
     * @param int $id
     * @param InviteMemberRequest $request
     * @return JsonResponse
     */
    public function inviteMember(int $id, InviteMemberRequest $request): JsonResponse
    {
        $team = $this->teamRepository->findById($id);
        $members = $this->teamRepository->findMembers($team->id)->pluck('user_id');

        $roles = $team->roles;
        $incidents = $team->incidents;

        $users = $request->input('users');

        foreach ($users as $user)
        {
            if ($members->contains($user))
            {
                return response()->json(['message' => 'The member is already in that team.']);
            }

            else
            {
                $existingMembers = $this->teamRepository->findMembersByUser($team->id, $user);

                if ($existingMembers->isEmpty())
                {
                    $team->members()->create([
                        "team_id" => $team->id,
                        "user_id" => $user
                    ]);
                }

                foreach ($roles as $role)
                {
                    $this->userRepository->findById($user)->assignRole()->create([
                        'role_id' => $role->id,
                        'model_type' => $this->userClass,
                        'model_id' => (int) $user,
                        'model_from' => Team::modelTypePath($id)
                    ]);
                }

                foreach ($incidents as $incident)
                {
                    $caller = Executing::where('incident_id', $incident->id)
                        ->pluck('caller_id')
                        ->first();

                    $incident->execute()->create([
                        'incident_id' => $incident->id,
                        'caller_id' => $caller,
                        'executor_id' => (int) $user,
                        'model_from' => Team::modelTypePath($id),
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]);
                }
            }
        }

        return response()->json(['message' => 'Members were added successfully for this team.']);
    }

    /**
     * Remove user/users from the desired team.
     *
     * @param int $id
     * @param RemoveMemberRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function removeMember(int $id, RemoveMemberRequest $request): JsonResponse
    {
        $team = $this->teamRepository->findById($id);
        $owner = $team->owner_id;

        $users = $request->input('users');

        if (in_array($owner, $users, false))
        {
            return response()->json(['message' => 'The owner cannot be deleted.']);
        }

        foreach ($users as $user)
        {
            $user = (int) $user;

            Membership::where(['user_id' => $user, 'team_id' => $team->id])->delete();
            Executing::where(['executor_id' => $user, 'model_from' => Team::modelTypePath($id)])->delete();
            ModelHasRoles::where(['model_id' => $user,'model_from' => Team::modelTypePath($id)])->delete();
        }

        return response()->json(['message' => 'The member was successfully removed from the team.']);
    }

    /**
     * Assign an incident to the team with the desired data.
     *
     * @param int $id
     * @param AssignIncidentRequest $request
     * @return JsonResponse
     */
    public function assignIncidents(int $id, AssignIncidentRequest $request): JsonResponse
    {
        $team = $this->teamRepository->findById($id);

        $incidents = $request->input('incidents');

        foreach ($incidents as $incident)
        {
            if ($team->incidents->contains($incident))
            {
                return response()->json(['message' => 'This incident has already been assigned to this team.']);
            }

            $team->incidents()->attach(['incident_id' => $incident]);

            $teamIncident = $this->incidentRepository->findById($incident);

            $caller = Executing::where('incident_id', $teamIncident->id)
                ->pluck('caller_id')
                ->first();

            $members = $this->teamRepository->findMembers($id)->pluck('user_id');

            foreach ($members as $member)
            {
                $teamIncident->execute()->create([
                    'incident_id' => $incident,
                    'caller_id' => $caller,
                    'executor_id' => $member,
                    'model_type' => 'team',
                    'model_from' => Team::modelTypePath($id)
                ]);
            }
        }

        return response()->json(['message' => 'The incident has been successfully assigned to that team and team members.']);
    }

    /**
     * Remove incident/incidents from the desired team.
     *
     * @param int $id
     * @param RemoveIncidentRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function removeIncidents(int $id, RemoveIncidentRequest $request): JsonResponse
    {
        $team = $this->teamRepository->findById($id);

        $incidents = $request->input('incidents');

        foreach ($incidents as $incident)
        {
            $incident = (int) $incident;

            Incidentship::where(['incident_id' => $incident, 'team_id' => $team->id])->delete();
            Executing::where(['incident_id' => $incident, 'model_from' => Team::modelTypePath($id)])->delete();
        }

        return response()->json(['message' => 'The incident was successfully removed from the team.']);
    }

    /**
     * Add role/roles to the desired team.
     *
     * @param int $id
     * @param AssignRoleRequest $request
     * @return JsonResponse
     */
    public function assignRoles(int $id, AssignRoleRequest $request): JsonResponse
    {
        $team = $this->teamRepository->findById($id);
        $members = $this->teamRepository->findMembers($team->id)->pluck('user_id');

        $roles = $request->input('roles');

        foreach ($roles as $role)
        {
            if ($team->roles->contains($role))
            {
                return response()->json(['message' => 'The team already has that role.']);
            }

            $team->roles()->attach(["role_id" => $role]);

            foreach ($members as $member)
            {
                $this->userRepository->findById($member)->assignRole()->create([
                    'role_id' => $role,
                    'model_type' => $this->userClass,
                    'model_id' => $member,
                    'model_from' => Team::modelTypePath($id)
                ]);
            }
        }

        return response()->json(['message' => 'Roles were added successfully for this team.']);
    }

    /**
     * Remove role/roles from the desired team.
     *
     * @param int $id
     * @param RemoveRoleRequest $request
     * @return JsonResponse
     * @throws Exception
     */
    public function removeRoles(int $id, RemoveRoleRequest $request): JsonResponse
    {
        $team = $this->teamRepository->findById($id);

        $roles = $request->input('roles');

        foreach ($roles as $role)
        {
            $role = (int) $role;

            Roleship::where(['role_id' => $role, 'team_id' => $team->id])->delete();
            ModelHasRoles::where(['role_id' => $role, 'model_from' => Team::modelTypePath($id)])->delete();
        }

        return response()->json(['message' => 'The role was successfully removed from the team.']);
    }

    /**
     * Attach role/roles from the request input to the user.
     *
     * @param StoreTeamRequest $request
     * @param Model|Team $team
     * @param mixed $user
     */
    private function attachRole(StoreTeamRequest $request, Model|Team $team, mixed $user): void
    {
        $roles = $request->input('roles');

        if ($request->has('roles'))
        {
            foreach ($roles as $role)
            {
                $team->roles()->attach($team, ['role_id' => $role]);

                $user->assignRole()->create([
                    'role_id' => $role,
                    'model_type' => $this->userClass,
                    'model_id' => $user->id,
                    'model_from' => Team::modelTypePath($team->id)
                ]);
            }
        }
    }
}
