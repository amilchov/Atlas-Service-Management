<?php

namespace App\Http\Api\Chart\Controllers;

use App\Http\Api\Chart\Services\ChartService;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Chart Controller
|--------------------------------------------------------------------------
|
| This class is a type of controller, in which we have
| the basic chart data from the Chart Service class.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class ChartController extends Controller
{
    /**
     * Initializing the instance of Chart Service class.
     *
     * @var ChartService
     */
    private ChartService $chartService;

    /**
     * ChartController constructor.
     *
     * @param ChartService $chartService
     */
    public function __construct(ChartService $chartService)
    {
        $this->chartService = $chartService;
    }

    /**
     * Call the method for charts from the service class.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        return $this->chartService->all();
    }

    /**
     * Call the method for desired chart from the service class.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        return $this->chartService->show($id);
    }

    /**
     * Call the method for desired chart data from the service class.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function data(int $id): JsonResponse
    {
        return $this->chartService->showData($id);
    }
}
