<?php

namespace App\Http\Api\User\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
|--------------------------------------------------------------------------
| User Resource
|--------------------------------------------------------------------------
|
| This class is a type of resource, in which
| we return the whole data about the user.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UserResource extends JsonResource
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
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'email' => $this->email,
            'password' => $this->password,
            'avatar' => $this->avatar,
            'token' => $this->token,
            'description' => $this->description,
            'city' => $this->city,
            'country' => $this->country,
            'last_login_ip' => $this->last_login_ip,
            'last_login_at' => $this->last_login_at,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'roles' => $this->roles,
            'incidents' => $this->incidents
        ];
    }
}
