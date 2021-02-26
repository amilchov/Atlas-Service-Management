<?php

namespace App\Http\Api\Incident\Resources\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

/**
|--------------------------------------------------------------------------
| Incident Collection
|--------------------------------------------------------------------------
|
| This class is a type of resource collection, in which
| we return the whole data about the incidents.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class IncidentCollection extends ResourceCollection
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
