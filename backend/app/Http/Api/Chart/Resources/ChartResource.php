<?php

namespace App\Http\Api\Chart\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
|--------------------------------------------------------------------------
| Chart Resource
|--------------------------------------------------------------------------
|
| This class is a type of resource, in which
| we return the whole data about the chart.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class ChartResource extends JsonResource
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
            'chart' => [
                'id' => $this->id,
                'name' => $this->name,
                'description' => $this->description,
                'tag' => $this->tag,
                'data_link' => $this->data_link,
                'grafana_link' => $this->grafana_link,
                'image_link' => $this->image_link,
                'value_type' => $this->value_type,
                'roles' => $this->roles
            ]
        ];
    }
}
