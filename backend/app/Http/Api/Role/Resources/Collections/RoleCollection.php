<?php

namespace App\Http\Api\Role\Resources\Collections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Support\Collection;

/**
|--------------------------------------------------------------------------
| Role Collection
|--------------------------------------------------------------------------
|
| This class is a type of resource collection, in whose we return
| the whole data about the roles.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class RoleCollection extends ResourceCollection
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
