<?php

namespace App\Http\Api\Team\Resources\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

/**
|--------------------------------------------------------------------------
| Team Collection
|--------------------------------------------------------------------------
|
| This class is a type of resource collection, in which
| we return the whole data about the teams.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class TeamCollection extends ResourceCollection
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
