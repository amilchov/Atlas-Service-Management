<?php

namespace App\Http\Api\Chart\Resources\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

/**
|--------------------------------------------------------------------------
| Chart Collection
|--------------------------------------------------------------------------
|
| This class is a type of resource collection, in which
| we return the whole data about the charts.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class ChartCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param $request
     * @return Collection
     */
    public function toArray($request): Collection
    {
        return $this->collection;
    }
}
