<?php

namespace App\Http\Api\Team\Models;

use App\Http\Api\Incident\Models\Executing;
use App\Http\Api\Incident\Models\Incident;
use App\Http\Api\Role\Models\ModelHasRoles;
use App\Http\Api\User\Models\User;
use App\Http\Traits\HasPicture;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Models\Role;
use Exception;

/**
|--------------------------------------------------------------------------
| Team Model
|--------------------------------------------------------------------------
|
| This class is a type of model, in which we have
| the team model which is used to interact with table "teams".
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class Team extends Model
{
    use HasPicture;

    /**
     * Team's default image path and name.
     *
     * @var string
     */
    public const DEFAULT_PICTURE = 'teams/default.png';

    /**
     * Default date format.
     *
     * @var string
     */
    private const DEFAULT_FORMAT = 'Y-m-d H:i:s';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'owner_id',
        'name',
        'description',
        'image',
    ];

    /**
     * The accessor get the team's image public path.
     *
     * @return string
     */
    public function getImageAttribute(): string
    {
        return config('app.url') . Storage::url($this->attributes['image']);
    }

    /**
     * The accessor format the team's created_at field.
     *
     * @return string
     */
    public function getCreatedAtAttribute(): string
    {
        return Carbon::parse($this->attributes['created_at'])->format(self::DEFAULT_FORMAT);
    }

    /**
     * The accessor format the team's updated_at field.
     *
     * @return string
     */
    public function getUpdatedAtAttribute(): string
    {
        return Carbon::parse($this->attributes['updated_at'])->format(self::DEFAULT_FORMAT);
    }

    /**
     * Set the model type path in pivot table `incident_user` with the certain team id.
     *
     * @param int $id
     * @return string
     */
    public static function modelTypePath(int $id): string
    {
        return self::class . "\\" . $id;
    }

    /**
     * Get the owner of the team.
     *
     * @return BelongsTo
     */
    public function owner(): BelongsTo
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    /**
     * Get the members of the team.
     *
     * @return BelongsTo
     */
    public function members(): BelongsTo
    {
        return $this->belongsTo(Membership::class);
    }

    /**
     * The users that belong to the team.
     *
     * @return BelongsToMany
     */
    public function users(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'team_user', 'team_id', 'user_id')->withTimestamps();
    }

    /**
     * The roles that belong to the team.
     *
     * @return BelongsToMany
     */
    public function roles(): BelongsToMany
    {
        return $this->belongsToMany(Role::class, 'team_role', 'team_id', 'role_id')->withTimestamps();
    }

    /**
     * The incidents that belong to the team.
     *
     * @return BelongsToMany
     */
    public function incidents(): BelongsToMany
    {
        return $this->belongsToMany(Incident::class, 'team_incident', 'team_id', 'incident_id')->withTimestamps();
    }

    /**
     * Remove related records in 'incident_user' and 'model_has_roles' tables.
     *
     * @param int $id
     * @throws Exception
     */
    public function removeRelations(int $id) : void
    {
        Executing::where('model_from', self::modelTypePath($id))->delete();
        ModelHasRoles::where('model_from', self::modelTypePath($id))->delete();
    }
}
