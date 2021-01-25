<?php

namespace App\Http\Api\Auth\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
|--------------------------------------------------------------------------
| Auth Resource
|--------------------------------------------------------------------------
|
| This class is a type of resource, in whose we return
| the whole data about the user.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class AuthResource extends JsonResource
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
            'password' => $this->password,
            'avatar' => $this->avatar,
            'token' => $this->token,
            'created_at' => $this->created_at->toDateTimeString(),
            'updated_at' => $this->updated_at->toDateTimeString(),
            'roles' => $this->roles
        ];
    }
}
