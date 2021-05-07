<?php

namespace App\Http\Api\User\Models;

use App\Http\Api\Incident\Models\Incident;
use App\Http\Api\Incident\Models\Executing;
use App\Http\Api\Role\Models\ModelHasRoles;
use App\Http\Api\Team\Models\Team;
use App\Http\Traits\HasPicture;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Support\Carbon;

/**
|--------------------------------------------------------------------------
| User Model
|--------------------------------------------------------------------------
|
| This class is a type of model, in which we have
| the user model which is used to interact with the corresponding table "users".
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class User extends Authenticatable
{
    use Notifiable, HasRoles, HasPicture;

    /**
     * User's default avatar path and name.
     *
     * @var string
     */
    public const DEFAULT_PICTURE = 'avatars/default.png';

    /**
     * Default date format.
     *
     * @var string
     */
    private const DEFAULT_FORMAT = 'Y-m-d H:i:s';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name',
        'middle_name',
        'last_name',
        'email',
        'password',
        'avatar',
        'token',
        'description',
        'city',
        'country',
        'last_login_ip',
        'last_login_at'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessor get the user's avatar public path.
     *
     * @return string
     */
    public function getAvatarAttribute(): string
    {
        return config('app.url') . Storage::url($this->attributes['avatar']);
    }

    /**
     * The accessor format the user's created_at field.
     *
     * @return string
     */
    public function getCreatedAtAttribute(): string
    {
        return Carbon::parse($this->attributes['created_at'])->format(self::DEFAULT_FORMAT);
    }

    /**
     * The accessor format the user's updated_at field.
     *
     * @return string
     */
    public function getUpdatedAtAttribute(): string
    {
        return Carbon::parse($this->attributes['updated_at'])->format(self::DEFAULT_FORMAT);
    }

    /**
     * The mutator set the user's password to be encrypted.
     *
     * @param $value
     */
    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }

    /**
     * The teams that belong to the user.
     *
     * @return BelongsToMany
     */
    public function teams(): BelongsToMany
    {
        return $this->belongsToMany(Team::class, 'team_user', 'user_id', 'team_id')->withTimestamps();
    }

    /**
     * The executed incidents that belong to the user.
     *
     * @return HasMany
     */
    public function execute(): HasMany
    {
        return $this->hasMany(Executing::class);
    }

    /**
     * @return BelongsToMany
     */
    public function callers(): BelongsToMany
    {
        return $this->belongsToMany(Incident::class, 'incident_user', 'caller_id', 'incident_id');
    }

    /**
     * @return BelongsToMany
     */
    public function executors(): BelongsToMany
    {
        return $this->belongsToMany(Incident::class, 'incident_user', 'executor_id', 'incident_id');
    }

    /**
     * @return BelongsToMany
     */
    public function incidents(): BelongsToMany
    {
        return $this->belongsToMany(Incident::class, 'incident_user', 'executor_id', 'incident_id')->withPivot('model_type');
    }

    /**
     * Get the members of the team.
     *
     * @return BelongsTo
     */
    public function assignRole(): BelongsTo
    {
        return $this->belongsTo(ModelHasRoles::class);
    }
}
