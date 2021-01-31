<?php

namespace App\Http\Api\Auth\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

/**
|--------------------------------------------------------------------------
| Auth Model
|--------------------------------------------------------------------------
|
| This class is a type of model, in whose we have
| the auth model which is used to interact with table "users".
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class Auth extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * Auth's default avatar path and name.
     *
     * @var string
     */
    public const DEFAULT_AVATAR = 'avatars/default.png';

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
        'token',
        'avatar'
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
     * The mutator set the user's password to be encrypted.
     *
     * @param $value
     */
    public function setPasswordAttribute($value): void
    {
        $this->attributes['password'] = Hash::make($value);
    }
}
