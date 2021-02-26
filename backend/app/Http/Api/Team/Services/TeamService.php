<?php

namespace App\Http\Api\Team\Services;

use App\Http\Api\Team\Models\Invitation;
use App\Http\Api\Team\Repositories\TeamRepository;
use App\Http\Api\Team\Requests\AssignRequest;
use App\Http\Api\Team\Requests\InviteRequest;
use App\Http\Api\Team\Requests\StoreRequest;
use App\Http\Api\Team\Requests\UpdateRequest;
use App\Http\Api\Team\Resources\Collections\TeamCollection;
use App\Http\Api\Team\Resources\TeamResource;
use App\Http\Api\Team\Models\Team;
use App\Http\Api\Team\Models\Membership;
use App\Http\Api\User\Repositories\UserRepository;
use Illuminate\Http\JsonResponse;

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
     * Initializing the instance of Team Repository class.
     *
     * @var TeamRepository
     */
    private TeamRepository $teamRepository;

    /**
     * Initializing the instance of User Repository class.
     *
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * TeamService constructor.
     *
     * @param TeamRepository $teamRepository
     * @param UserRepository $userRepository
     */
    public function __construct(TeamRepository $teamRepository, UserRepository $userRepository)
    {
        $this->teamRepository = $teamRepository;
        $this->userRepository = $userRepository;
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
     * Create the team with the desired data.
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function create(StoreRequest $request): JsonResponse
    {
        $user = $this->userRepository->findByToken($request);

        $roles = $request->input('roles');

        $validated = $request->validated();

        $team = Team::create([
            'owner_id' => $user->id,
            'name' => $validated['name'],
            'description' => $validated['description'],
            'image' => $validated['image'] ?? Team::DEFAULT_PICTURE,
        ]);

        $team->checkForPicture($request, 'image', 'teams', $team);

        $user->teams()->attach($team);

        if ($request->has('roles'))
        {
            foreach($roles as $role)
            {
                $team->roles()->attach($team, ['role_id' => $role]);

                $user->assignRole($role);
            }
        }

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
     * @param UpdateRequest $request
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request): JsonResponse
    {
        $team = $this->teamRepository->findById($id);

        $team->deletePicture(Team::class, $team, 'image');

        $team->update($request->validated());

        $team->checkForPicture($request, 'image', 'teams', $team);

        return response()->json(new TeamResource($team));
    }

    /**
     * Delete the team with the desired data.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $team = $this->teamRepository->findById($id);

        $team->deletePicture(Team::class, $team, 'image');

        $team->members()->delete();
        $team->delete();

        return response()->json(['message' => 'The team was successfully deleted.']);
    }

    /**
     * Invite user/users with role/roles to the desired team.
     *
     * @param InviteRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function invite(InviteRequest $request, int $id): JsonResponse
    {
        $user = $this->userRepository->findByToken($request);
        $team = $this->teamRepository->findById($id);

        $owner = $team->owner->id;
        $roles = $team->roles()->get();

        if ($user->id == $owner)
        {
            $validated = $request->validated();

            $users = $validated['users'];

            if (in_array($owner, $users, false))
            {
                return response()->json(['message' => 'The team owner cannot add himself as member.']);
            }

            foreach ($users as $user)
            {
                $this->userRepository->findById($user)->assignRole($roles);

                $members = Membership::where(['team_id' => $team->id, 'user_id' => $user])->get();

                if ($members->isEmpty())
                {
                    $team->members()->create([
                        "team_id" => $team->id,
                        "user_id" => $user
                    ]);
                }
            }

            return response()->json(['message' => 'Members were added successfully for this team.']);
        }

        return response()->json(['message' => 'This user is not the owner of the team and cannot add members.']);
    }

    /**
     * Add role/roles to the desired team.
     *
     * @param AssignRequest $request
     * @param int $id
     * @return JsonResponse
     */
    public function assignRoles(AssignRequest $request, int $id): JsonResponse
    {
        $user = $this->userRepository->findByToken($request);
        $team = $this->teamRepository->findById($id);

        $owner = $team->owner->id;
        $members = Membership::where('team_id', $team->id)->pluck('user_id');

        if ($user->id == $owner)
        {
            $validated = $request->validated();

            $roles = $validated['roles'];

            foreach ($roles as $role)
            {
                if ($team->roles->contains($role))
                {
                    return response()->json(['message' => 'The team already has this role.']);
                }

                $team->roles()->attach(["role_id" => $role]);
            }

            foreach ($members as $member)
            {
                $this->userRepository->findById($member)->assignRole($roles);
            }

            return response()->json(['message' => 'Roles were added successfully for this team.']);
        }

        return response()->json(['message' => 'This user is not the owner of the team and cannot add members.']);
    }
}
