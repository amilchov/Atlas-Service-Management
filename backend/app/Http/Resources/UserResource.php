<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
|--------------------------------------------------------------------------
| User Resource
|--------------------------------------------------------------------------
|
| This class is a type of resource, in whose we return
| the whole data about the user.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UserResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray($request): array
    {
        return [
            'id' => $this->id,
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'avatar' => $this->avatar,
            'token' => $this->token,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'roles' => $this->roles,
        ];
    }
}
