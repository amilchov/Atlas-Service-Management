<?php

namespace App\Http\Api\Chart\Services;

use App\Http\Api\Chart\Resources\Collections\ChartCollection;
use App\Http\Api\Chart\Models\Chart;
use Illuminate\Http\JsonResponse;

/**
|--------------------------------------------------------------------------
| Chart Service
|--------------------------------------------------------------------------
|
| This class is a type of service, in whose we are getting
| the full data about charts stuff.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class ChartService
{
    /**
     * Obtain the all data for charts.
     *
     * @return JsonResponse
     */
    public function charts() : JsonResponse
    {
        $charts = Chart::all();

        return response()->json(new ChartCollection($charts));
    }
}
