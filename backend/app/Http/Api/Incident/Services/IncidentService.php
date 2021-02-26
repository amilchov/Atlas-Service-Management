<?php

namespace App\Http\Api\Incident\Services;

use App\Http\Api\Incident\Models\Incident;
use App\Http\Api\Incident\Requests\StoreRequest;
use App\Http\Api\Incident\Requests\UpdateRequest;
use App\Http\Api\Incident\Resources\Collections\IncidentCollection;
use App\Http\Api\Incident\Resources\IncidentResource;
use App\Http\Api\User\Repositories\UserRepository;
use App\Http\Api\Incident\Repositories\IncidentRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
|--------------------------------------------------------------------------
| Incident Service
|--------------------------------------------------------------------------
|
| This class is a type of service, in which we are
| getting the full data about incident stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class IncidentService
{
    /**
     * Initializing the instance of User Repository class.
     *
     * @var UserRepository
     */
    private UserRepository $userRepository;

    /**
     * Initializing the instance of Incident Repository class.
     *
     * @var IncidentRepository
     */
    private IncidentRepository $incidentRepository;

    /**
     * IncidentService constructor.
     *
     * @param UserRepository $userRepository
     * @param IncidentRepository $incidentRepository
     */
    public function __construct(UserRepository $userRepository, IncidentRepository $incidentRepository)
    {
        $this->userRepository = $userRepository;
        $this->incidentRepository = $incidentRepository;
    }

    /**
     * Call the method for obtain all incidents from the repository class.
     *
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        $incidents = $this->incidentRepository->all();

        return response()->json(new IncidentCollection($incidents));
    }

    /**
     * Call the method for finding the user by token, then get all incidents attached to him.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function userIncidents(Request $request): JsonResponse
    {
        $user = $this->userRepository->findByToken($request);

        $incidents = $user->incidents()->get();

        return response()->json(new IncidentCollection($incidents));
    }

    /**
     * Create the incident with the desired data.
     *
     * @param StoreRequest $request
     * @return JsonResponse
     */
    public function create(StoreRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $user = $this->userRepository->findByToken($request);

        $number = Incident::latest()->value('number');

        $incident = Incident::create([
            'number' => $number ? $number + 1 : 10000,
            'category_id' => $validated['category_id'],
            'state' => $validated['state'],
            'impact' => $validated['impact'],
            'urgency' => $validated['urgency'],
            'priority' => $validated['priority'],
            'short_description' => $validated['short_description'],
            'description' => $validated['description'] ?? null
        ]);

        $incident->execute()->create([
            'incident_id' => $incident->id,
            'caller_id' => $user->id,
            'executor_id' => $validated['executor_id']
        ]);

        return response()->json(new IncidentResource($incident));
    }

    /**
     * Show the incident with the specific id.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $incident = $this->incidentRepository->findById($id);

        return response()->json(new IncidentResource($incident));
    }

    /**
     * Update the incident with the specific id.
     *
     * @param int $id
     * @param UpdateRequest $request
     * @return JsonResponse
     */
    public function update(int $id, UpdateRequest $request): JsonResponse
    {
        $user = $this->userRepository->findByToken($request);
        $incident = $this->incidentRepository->findById($id);

        foreach ($incident->caller as $caller)
        {
            $caller_token = $caller->token;
        }

        foreach ($incident->executor as $executor)
        {
            $executor_token = $executor->token;
        }

        if ($user->token == $caller_token || $user->token == $executor_token)
        {
            $incident->update($request->validated());

            return response()->json(new IncidentResource($incident));
        }

        return response()->json(['message' => 'User token is not same as incident caller token or executor token.']);
    }

    /**
     * Delete the incident with the specific id.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function delete(int $id): JsonResponse
    {
        $incident = $this->incidentRepository->findById($id);

        $incident->execute()->delete();
        $incident->delete();

        return response()->json(['message' => 'The incident was successfully deleted.']);
    }
}
