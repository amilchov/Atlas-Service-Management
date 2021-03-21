<?php

namespace App\Http\Api\Team\Models;

use Illuminate\Database\Eloquent\Relations\Pivot;

/**
|--------------------------------------------------------------------------
| Membership Model
|--------------------------------------------------------------------------
|
| This class is a type of model, in which we have
| the team model and user model which are used to interact with the corresponding table "team_user".
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class Membership extends Pivot
{
    /**
     * The table associated with the pivot model.
     *
     * @var string
     */
    protected $table = 'team_user';
}
