<?php

namespace App\Http\Api\Team\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
|--------------------------------------------------------------------------
| Team Resource
|--------------------------------------------------------------------------
|
| This class is a type of resource, in which
| we return the whole data about the team.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class TeamResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'owner_id' => $this->owner_id,
            'name' => $this->name,
            'description' => $this->description,
            'image' => $this->image,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'users' => $this->users,
            'roles' => $this->roles,
        ];
    }
}

