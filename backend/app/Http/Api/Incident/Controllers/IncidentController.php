<?php

namespace App\Http\Api\Incident\Controllers;

use App\Http\Api\Incident\Services\IncidentService;
use App\Http\Api\Incident\Requests\StoreIncidentRequest;
use App\Http\Api\Incident\Requests\UpdateIncidentRequest;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

/**
|--------------------------------------------------------------------------
| Incident Controller
|--------------------------------------------------------------------------
|
| This class is a type of controller, in which we have
| the basic incident data from the Incident Service class.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class IncidentController extends Controller
{
    /**
     * Initializing the instance of Incident Service class.
     *
     * @var IncidentService
     */
    private IncidentService $incidentService;

    /**
     * IncidentController constructor.
     *
     * @param IncidentService $incidentService
     */
    public function __construct(IncidentService $incidentService)
    {
        $this->incidentService = $incidentService;
    }

    /**
     * Call the method for all incidents from the service class.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->incidentService->all();
    }

    /**
     * Call the method for user's incidents from the service class.
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function user(Request $request): JsonResponse
    {
        return $this->incidentService->userIncidents($request);
    }

    /**
     * Call the method for create an incident from the service class.
     *
     * @param StoreIncidentRequest $request
     * @return JsonResponse
     */
    public function store(StoreIncidentRequest $request): JsonResponse
    {
        return $this->incidentService->create($request);
    }

    /**
     * Call the method for show an incident from the service class.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->incidentService->show($id);
    }

    /**
     * Call the method for update an incident from the service class.
     *
     * @param int $id
     * @param UpdateIncidentRequest $request
     * @return JsonResponse
     */
    public function update(int $id, UpdateIncidentRequest $request): JsonResponse
    {
        return $this->incidentService->update($id, $request);
    }

    /**
     * Call the method for delete an incident from the service class.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function destroy(int $id): JsonResponse
    {
        return $this->incidentService->delete($id);
    }
}
