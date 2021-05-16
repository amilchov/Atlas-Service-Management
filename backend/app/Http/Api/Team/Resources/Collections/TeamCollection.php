<?php

namespace App\Http\Api\Team\Resources\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;

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
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'teams' => $this->collection->transform(function($team){
                return [
                    'id' => $team->id,
                    'owner' => [$team->owner],
                    'name' => $team->name,
                    'description' => $team->description,
                    'image' => $team->image,
                    'created_at' => $team->created_at,
                    'updated_at' => $team->updated_at,
                    'users' => $team->users,
                    'roles' => $team->roles,
                    'incidents' => $team->incidents
                ];
            }),
        ];
    }
}
