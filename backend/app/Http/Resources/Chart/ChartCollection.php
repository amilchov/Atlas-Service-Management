<?php

namespace App\Http\Resources\Chart;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

/**
|--------------------------------------------------------------------------
| Chart Collection
|--------------------------------------------------------------------------
|
| This class is a type of resource collection, in whose we return
| the whole data about the charts.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class ChartCollection extends ResourceCollection
{
    /**
     * @param Request $request
     * @return Collection
     */
    public function toArray($request): Collection
    {
        return $this->collection;
    }
}
