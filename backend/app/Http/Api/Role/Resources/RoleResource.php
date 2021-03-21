<?php

namespace App\Http\Api\Role\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
|--------------------------------------------------------------------------
| Role Resource
|--------------------------------------------------------------------------
|
| This class is a type of resource, in which
| we return the whole data about the role.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class RoleResource extends JsonResource
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
            'name' => $this->name,
            'description' => $this->description,
            'guard_name' => $this->guard_name,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at
        ];
    }
}

