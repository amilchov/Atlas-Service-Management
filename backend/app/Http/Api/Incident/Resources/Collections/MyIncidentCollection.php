<?php

namespace App\Http\Api\Incident\Resources\Collections;

use Illuminate\Http\Resources\Json\ResourceCollection;

/**
|--------------------------------------------------------------------------
| Incident Collection
|--------------------------------------------------------------------------
|
| This class is a type of resource collection, in which
| we return the whole data about the incidents.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class MyIncidentCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @param $request
     * @return array
     */
    public function toArray($request) : array
    {
        return [
            'incidents' => $this->collection->transform(function($incident){
                $executor_id = $incident->pivot->executor_id;

                return [
                    'id' => $incident->id,
                    'number' => $incident->number,
                    'category_id' => $incident->category_id,
                    'state' => $incident->state,
                    'impact' => $incident->impact,
                    'urgency' => $incident->urgency,
                    'priority' => $incident->priority,
                    'short_description' => $incident->short_description,
                    'description' => $incident->description,
                    'created_at' => $incident->created_at,
                    'updated_at' => $incident->updated_at,
                    'caller' => $incident->caller->unique(),
                    'executor' => $incident->executors($executor_id)->get()->unique(),
                    'model_type' => $incident->pivot->model_type
                ];
            })
        ];
    }
}
