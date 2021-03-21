<?php

namespace App\Http\Api\Chart\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
|--------------------------------------------------------------------------
| Chart Model
|--------------------------------------------------------------------------
|
| This class is a type of model, in which we have
| the chart model which is used to interact with the corresponding table "charts".
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class Chart extends Model
{
    /**
     * The roles that belong to the chart.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->morphToMany(
            config('permission.models.role'),
            'model',
            config('permission.table_names.model_has_roles'),
            config('permission.column_names.model_morph_key'),
            'role_id'
        );
    }
}
