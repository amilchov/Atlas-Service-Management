<?php

namespace App\Http\Api\Role\Repositories;

use App\Http\Api\Role\Interfaces\RoleRepositoryInterface;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Eloquent\Collection;

/**
|--------------------------------------------------------------------------
| Role Repository
|--------------------------------------------------------------------------
|
| This class is a type of repository, in which we are
| getting database data connected with the roles.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class RoleRepository implements RoleRepositoryInterface
{
    /** @inheritDoc */
    public function all(): array|Collection
    {
        return Role::all();
    }

    /** @inheritDoc */
    public function findById(int $id): mixed
    {
        return Role::findOrFail($id);
    }
}
