<?php

namespace App\Http\Api\Incident\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
|--------------------------------------------------------------------------
| Incident Resource
|--------------------------------------------------------------------------
|
| This class is a type of resource, in which
| we return the whole data about the incident.
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
            'number' => $this->number,
            'category_id' => $this->category_id,
            'state' => $this->state,
            'impact' => $this->impact,
            'urgency' => $this->urgency,
            'priority' => $this->priority,
            'short_description' => $this->short_description,
            'description' => $this->description,
            'caller' => $this->caller,
            'executor' => $this->executor
        ];
    }
}

