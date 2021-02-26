<?php

namespace App\Http\Api\Incident\Models;

use App\Http\Api\Chart\Models\Chart;
use App\Http\Api\User\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
|--------------------------------------------------------------------------
| Incident Model
|--------------------------------------------------------------------------
|
| This class is a type of model, in which we have
| the incident model which is used to interact with the corresponding table "incidents".
|
| @author David Ivanov <david4obgg1@gmail.com>
 */

class Incident extends Model
{
    use HasFactory;

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
        'number',
        'category_id',
        'state',
        'impact',
        'urgency',
        'priority',
        'short_description',
        'description'
    ];

    /**
     * The accessor format the incident's created_at field.
     *
     * @return string
     */
    public function getCreatedAtAttribute(): string
    {
        return Carbon::parse($this->attributes['created_at'])->format(self::DEFAULT_FORMAT);
    }

    /**
     * The accessor format the incident's updated_at field.
     *
     * @return string
     */
    public function getUpdatedAtAttribute(): string
    {
        return Carbon::parse($this->attributes['updated_at'])->format(self::DEFAULT_FORMAT);
    }

    /**
     * The accessor associate the incident's category_id with chart_id in charts table.
     *
     * @return mixed
     */
    public function getCategoryIdAttribute()
    {
        return Chart::where('id', $this->attributes['category_id'])->get();
    }

    /**
     * The caller that belong to the incident.
     *
     * @return BelongsToMany
     */
    public function caller(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'incident_user', 'incident_id', 'caller_id');
    }

    /**
     * The executor that belong to the incident.
     *
     * @return BelongsToMany
     */
    public function executor(): BelongsToMany
    {
        return $this->belongsToMany(User::class, 'incident_user', 'incident_id', 'executor_id');
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
}
