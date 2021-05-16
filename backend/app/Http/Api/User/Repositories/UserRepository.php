<?php

namespace App\Http\Api\User\Repositories;

use App\Http\Api\User\Models\User;
use App\Http\Api\User\Interfaces\UserRepositoryInterface;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

/**
|--------------------------------------------------------------------------
| User Repository
|--------------------------------------------------------------------------
|
| This class is a type of repository, in which we are
| getting database data connected with the user.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class UserRepository implements UserRepositoryInterface
{
    /** @inheritDoc */
    public function all(): array|Collection
    {
        return User::with(['roles', 'incidents'])->get();
    }

    /** @inheritDoc */
    public function findByToken(Request $request): Model|User|Builder
    {
        $token = $request->header('Authorization');

        return User::where('token', $token)->firstOrFail();
    }

    /** @inheritDoc */
    public function findById(int $id): array|Collection|Model|User
    {
        return User::findOrFail($id);
    }
}
