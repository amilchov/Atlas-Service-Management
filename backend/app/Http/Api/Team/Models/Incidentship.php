<?php

namespace App\Http\Api\Team\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
|--------------------------------------------------------------------------
| Incidentship Model
|--------------------------------------------------------------------------
|
| This class is a type of model, in which we have
| the team model and incident model which are used to interact with the corresponding table "team_incident".
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class Incidentship extends Pivot
{
    /**
     * The table associated with the pivot model.
     *
     * @var string
     */
    protected $table = 'team_incident';
}
