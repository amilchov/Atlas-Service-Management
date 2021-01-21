<?php

namespace App\Http\Controllers\Chart;

use App\Http\Controllers\Controller;
use App\Services\Chart\ChartService;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Chart Controller
|--------------------------------------------------------------------------
|
| This class is a type of controller, in whose we have
| the basic chart data from the Chart Service.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class ChartController extends Controller
{
    /**
     * Call the method for charts from the service class.
     *
     * @param ChartService $chartService
     * @return JsonResponse
     */
    public function charts(ChartService $chartService): JsonResponse
    {
        return $chartService->charts();
    }
}
