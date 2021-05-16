<?php

// @formatter:off
/**
 * A helper file for your Eloquent Models
 * Copy the phpDocs from this file to the correct Model,
 * And remove them from this file, to prevent double declarations.
 *
 * @author Barry vd. Heuvel <barryvdh@gmail.com>
 */


namespace App\Http\Api\Chart\Models{
/**
 * |--------------------------------------------------------------------------
 * | Chart Model
 * |--------------------------------------------------------------------------
 * |
 * | This class is a type of model, in which we have
 * | the chart model which is used to interact with the corresponding table "charts".
 * 
 * |
 * | @author David Ivanov <david4obgg1@gmail.com>
 *
 * @property int $id
 * @property string $name
 * @property string $description
 * @property string $tag
 * @property string $data_link
 * @property string $image_link
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @method static \Illuminate\Database\Eloquent\Builder|Chart newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chart newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Chart query()
 * @method static \Illuminate\Database\Eloquent\Builder|Chart whereDataLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chart whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chart whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chart whereImageLink($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chart whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Chart whereTag($value)
 */
	class Chart extends \Eloquent {}
}

namespace App\Http\Api\Incident\Models{
/**
 * |--------------------------------------------------------------------------
 * | Executing Model
 * |--------------------------------------------------------------------------
 * |
 * | This class is a type of model, in which we store the incident and user models,
 * | which are used to interact with the corresponding table "incident_user".
 * 
 * |
 * | @author David Ivanov <david4obgg1@gmail.com>
 *
 * @property int $id
 * @property int $incident_id
 * @property int $caller_id
 * @property int $executor_id
 * @property string $model_from
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Executing newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Executing newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Executing query()
 * @method static \Illuminate\Database\Eloquent\Builder|Executing whereCallerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executing whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executing whereExecutorId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executing whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executing whereIncidentId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executing whereModelFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Executing whereUpdatedAt($value)
 */
	class Executing extends \Eloquent {}
}

namespace App\Http\Api\Incident\Models{
/**
 * |--------------------------------------------------------------------------
 * | Incident Model
 * |--------------------------------------------------------------------------
 * |
 * | This class is a type of model, in which we have
 * | the incident model which is used to interact with the corresponding table "incidents".
 * 
 * |
 * | @author David Ivanov <david4obgg1@gmail.com>
 *
 * @property int $id
 * @property int $number
 * @property array|\Illuminate\Database\Eloquent\Collection $category_id
 * @property string $state
 * @property string $impact
 * @property string $urgency
 * @property string $priority
 * @property string $short_description
 * @property string|null $description
 * @property string $created_at
 * @property string $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Api\User\Models\User[] $caller
 * @property-read int|null $caller_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Api\Incident\Models\Executing[] $execute
 * @property-read int|null $execute_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Api\User\Models\User[] $executor
 * @property-read int|null $executor_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Api\Team\Models\Team[] $teams
 * @property-read int|null $teams_count
 * @method static \Illuminate\Database\Eloquent\Builder|Incident newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Incident newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Incident query()
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereImpact($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereNumber($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident wherePriority($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereShortDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereState($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Incident whereUrgency($value)
 */
	class Incident extends \Eloquent {}
}

namespace App\Http\Api\Role\Models{
/**
 * |--------------------------------------------------------------------------
 * | Models Has Roles
 * |--------------------------------------------------------------------------
 * |
 * | This class is a type of model, in which we have
 * | the role model and second model which is used to interact with the corresponding table "model_has_roles".
 * 
 * |
 * | @author David Ivanov <david4obgg1@gmail.com>
 *
 * @property int $role_id
 * @property string $model_type
 * @property int $model_id
 * @property string $model_from
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles query()
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles whereModelFrom($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles whereModelId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles whereModelType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ModelHasRoles whereRoleId($value)
 */
	class ModelHasRoles extends \Eloquent {}
}

namespace App\Http\Api\Team\Models{
/**
 * |--------------------------------------------------------------------------
 * | Membership Model
 * |--------------------------------------------------------------------------
 * |
 * | This class is a type of model, in which we have
 * | the team model and user model which are used to interact with the corresponding table "team_user".
 * 
 * |
 * | @author David Ivanov <david4obgg1@gmail.com>
 *
 * @property int $id
 * @property int $team_id
 * @property int $user_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership query()
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereTeamId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Membership whereUserId($value)
 */
	class Membership extends \Eloquent {}
}

namespace App\Http\Api\Team\Models{
/**
 * |--------------------------------------------------------------------------
 * | Team Model
 * |--------------------------------------------------------------------------
 * |
 * | This class is a type of model, in which we have
 * | the team model which is used to interact with table "teams".
 * 
 * |
 * | @author David Ivanov <david4obgg1@gmail.com>
 *
 * @property int $id
 * @property int $owner_id
 * @property string $name
 * @property string $description
 * @property string $image
 * @property string $created_at
 * @property string $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Api\Incident\Models\Incident[] $incidents
 * @property-read int|null $incidents_count
 * @property-read \App\Http\Api\Team\Models\Membership $members
 * @property-read \App\Http\Api\User\Models\User $owner
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Api\User\Models\User[] $users
 * @property-read int|null $users_count
 * @method static \Illuminate\Database\Eloquent\Builder|Team newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Team query()
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereImage($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereOwnerId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Team whereUpdatedAt($value)
 */
	class Team extends \Eloquent {}
}

namespace App\Http\Api\User\Models{
/**
 * |--------------------------------------------------------------------------
 * | User Model
 * |--------------------------------------------------------------------------
 * |
 * | This class is a type of model, in which we have
 * | the user model which is used to interact with the corresponding table "users".
 * 
 * |
 * | @author David Ivanov <david4obgg1@gmail.com>
 *
 * @property int $id
 * @property string $first_name
 * @property string $middle_name
 * @property string $last_name
 * @property string $email
 * @property string $password
 * @property string $avatar
 * @property string $token
 * @property string|null $description
 * @property string|null $city
 * @property string|null $country
 * @property string $created_at
 * @property string $updated_at
 * @property-read \App\Http\Api\Role\Models\ModelHasRoles $assignRole
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Api\Incident\Models\Incident[] $callers
 * @property-read int|null $callers_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Api\Incident\Models\Executing[] $execute
 * @property-read int|null $execute_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Api\Incident\Models\Incident[] $executors
 * @property-read int|null $executors_count
 * @property-read \Illuminate\Notifications\DatabaseNotificationCollection|\Illuminate\Notifications\DatabaseNotification[] $notifications
 * @property-read int|null $notifications_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Permission[] $permissions
 * @property-read int|null $permissions_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\Spatie\Permission\Models\Role[] $roles
 * @property-read int|null $roles_count
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Http\Api\Team\Models\Team[] $teams
 * @property-read int|null $teams_count
 * @method static \Illuminate\Database\Eloquent\Builder|User newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|User permission($permissions)
 * @method static \Illuminate\Database\Eloquent\Builder|User query()
 * @method static \Illuminate\Database\Eloquent\Builder|User role($roles, $guard = null)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereAvatar($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCity($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCountry($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereFirstName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereLastName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereMiddleName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User wherePassword($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereToken($value)
 * @method static \Illuminate\Database\Eloquent\Builder|User whereUpdatedAt($value)
 */
	class User extends \Eloquent {}
}

