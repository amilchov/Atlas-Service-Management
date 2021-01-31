<?php

namespace App\Http\Api\User\Resources\Collections;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

/**
|--------------------------------------------------------------------------
| User Collection
|--------------------------------------------------------------------------
|
| This class is a type of resource collection, in whose we return
| the whole data about users.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UserCollection extends ResourceCollection
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'users' => $this->collection
        ];
    }
}
