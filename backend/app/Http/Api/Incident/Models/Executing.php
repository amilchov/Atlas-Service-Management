<?php

namespace App\Http\Api\Incident\Models;

use Illuminate\Database\Eloquent\Model;

/**
|--------------------------------------------------------------------------
| Executing Model
|--------------------------------------------------------------------------
|
| This class is a type of model, in which we store the incident and user models,
| which are used to interact with the corresponding table "incident_user".
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class Executing extends Model
{
    /**
     * The table associated with the pivot model.
     *
     * @var string
     */
    protected $table = 'incident_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'incident_id',
        'caller_id',
        'executor_id',
        'model_type',
        'model_from'
    ];
}
