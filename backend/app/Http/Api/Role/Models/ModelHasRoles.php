<?php

namespace App\Http\Api\Role\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

/**
|--------------------------------------------------------------------------
| Models Has Roles
|--------------------------------------------------------------------------
|
| This class is a type of model, in which we have
| the role model and second model which is used to interact with the corresponding table "model_has_roles".
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class ModelHasRoles extends Model
{
    use Notifiable;

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'model_has_roles';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'role_id',
        'model_type',
        'model_id',
        'model_from'
    ];
}
