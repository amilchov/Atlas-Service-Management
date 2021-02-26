<?php

namespace App\Http\Api\Chart\Controllers;

use App\Http\Api\Chart\Repositories\ChartRepository;
use App\Http\Api\Chart\Resources\Collections\ChartCollection;
use App\Http\Api\Chart\Resources\ChartResource;
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
     * Initializing the instance of Chart Repository class.
     *
     * @var ChartRepository
     */
    private ChartRepository $chartRepository;

    /**
     * ChartController constructor.
     *
     * @param ChartRepository $chartRepository
     */
    public function __construct(ChartRepository $chartRepository)
    {
        $this->chartRepository = $chartRepository;
    }

    /**
     * Call the method for charts from the repository class.
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $charts = $this->chartRepository->all();

        return response()->json(new ChartCollection($charts));
    }

    /**
     * Call the method for desired chart from the chart repository.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $chart = $this->chartRepository->findById($id);

        return response()->json(new ChartResource($chart));
    }
}
