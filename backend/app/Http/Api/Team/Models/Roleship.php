<?php

namespace App\Http\Api\Team\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
|--------------------------------------------------------------------------
| Roleship Model
|--------------------------------------------------------------------------
|
| This class is a type of model, in which we have
| the team model and role model which are used to interact with the corresponding table "team_role".
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class Roleship extends Pivot
{
    /**
     * The table associated with the pivot model.
     *
     * @var string
     */
    protected $table = 'team_role';
}
