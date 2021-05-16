<?php

namespace App\Http\Api\Incident\Services;

use App\Http\Api\Incident\Models\Incident;
use App\Http\Api\Incident\Requests\StoreIncidentRequest;
use App\Http\Api\Incident\Requests\UpdateIncidentRequest;
use App\Http\Api\Incident\Resources\Collections\IncidentCollection;
use App\Http\Api\Incident\Resources\Collections\MyIncidentCollection;
use App\Http\Api\Incident\Resources\IncidentResource;
use App\Http\Api\User\Interfaces\UserRepositoryInterface;
use App\Http\Api\Incident\Interfaces\IncidentRepositoryInterface;
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
     * IncidentService constructor.
     *
     * @param UserRepositoryInterface $userRepository
     * @param IncidentRepositoryInterface $incidentRepository
     */
    public function __construct(UserRepositoryInterface $userRepository, IncidentRepositoryInterface $incidentRepository)
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

        $incidents = $user->executors()->get();

        return response()->json(new MyIncidentCollection($incidents));
    }

    /**
     * Create the incident with the desired data.
     *
     * @param StoreIncidentRequest $request
     * @return JsonResponse
     */
    public function create(StoreIncidentRequest $request): JsonResponse
    {
        $validated = $request->validated();

        $number = $this->incidentRepository->findLatestNumber();

        $incident = Incident::create([
            'number' => $number ? $number + 1 : Incident::DEFAULT_NUMBER,
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
            'caller_id' => $validated['caller_id'],
            'executor_id' => $validated['executor_id'],
            'model_type' => 'personal',
            'model_from' => Incident::class
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
     * @param UpdateIncidentRequest $request
     * @return JsonResponse
     */
    public function update(int $id, UpdateIncidentRequest $request): JsonResponse
    {
        $user = $this->userRepository->findByToken($request);
        $incident = $this->incidentRepository->findById($id);

        $caller_token = "";
        $executor_token = "";

        foreach ($incident->caller as $caller)
        {
            $caller_token = $caller->token;
        }

        foreach ($incident->executor as $executor)
        {
            $executor_token = $executor->token;
        }

        if ($user->token === $caller_token || $user->token === $executor_token)
        {
            $incident->update($request->validated());

            if ($request->has('caller_id'))
            {
                $incident->execute()->where(['incident_id' => $incident->id])->update([
                    'caller_id' => $request->input('caller_id')
                ]);
            }

            if ($request->has('executor_id'))
            {
                $incident->execute()->where(['incident_id' => $incident->id])->update([
                    'executor_id' => $request->input('executor_id')
                ]);
            }

            return response()->json(new IncidentResource($this->incidentRepository->findById($incident->id)));
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

        $incident->delete();

        return response()->json(['message' => 'The incident was successfully deleted.']);
    }
}
