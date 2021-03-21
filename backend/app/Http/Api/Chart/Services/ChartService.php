<?php

namespace App\Http\Api\Chart\Services;

use App\Http\Api\Chart\Interfaces\ChartRepositoryInterface;
use App\Http\Api\Chart\Resources\Collections\ChartCollection;
use App\Http\Api\Chart\Resources\ChartResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

/**
|--------------------------------------------------------------------------
| Chart Service
|--------------------------------------------------------------------------
|
| This class is a type of service, in which we are
| getting the full data about charts stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class ChartService
{
    /**
     * Initializing the instance of Chart Repository interface.
     *
     * @var ChartRepositoryInterface
     */
    private ChartRepositoryInterface $chartRepository;

    /**
     * ChartService constructor.
     *
     * @param ChartRepositoryInterface $chartRepository
     */
    public function __construct(ChartRepositoryInterface $chartRepository)
    {
        $this->chartRepository = $chartRepository;
    }

    /**
     * Call the method to obtain all charts from the repository class.
     *
     * @return JsonResponse
     */
    public function all(): JsonResponse
    {
        $charts = $this->chartRepository->all();

        return response()->json(new ChartCollection($charts));
    }

    /**
     * Show the chart with the specific id.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        $chart = $this->chartRepository->findById($id);

        return response()->json(new ChartResource($chart));
    }

    /**
     * Call the method for desired chart from the chart repository.
     *
     * @param int $id
     * @return JsonResponse
     */
    public function showData(int $id) : JsonResponse
    {
        $chart = $this->chartRepository->findById($id);

        $dataLink = $chart->data_link;

        return response()->json(Http::get($dataLink)->json());
    }
}
