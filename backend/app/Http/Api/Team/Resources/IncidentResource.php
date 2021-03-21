<?php

namespace App\Http\Api\Team\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use JetBrains\PhpStorm\ArrayShape;

/**
|--------------------------------------------------------------------------
| Incident Resource
|--------------------------------------------------------------------------
|
| This class is a type of resource, in which
| we return the whole data about the team incident.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class IncidentResource extends JsonResource
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
            'team_id' => $this->team_id,
            'incident_id' => $this->incident_id
        ];
    }
}

