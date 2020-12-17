<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Spatie\Permission\Traits\HasRoles;

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasRoles;

    /**
     * Employee Self Service is a role, which is set on the default user.
     *
     * @var string
     */
    public const EMPLOYEE_SELF_SERVICE_ROLE = 'ess';

    /**
     * Admin is a role, which is set on the main user. He has all permissions and can manage anything.
     *
     * @var string
     */
    public const ADMIN_ROLE = 'admin';

    /**
     * User's default avatar path and name.
     *
     * @var string
     */
    public const DEFAULT_AVATAR = 'avatars/default.png';

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
