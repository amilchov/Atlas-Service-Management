<?php

namespace App\Http\Api\Role\Repositories;

use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Role;

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
class RoleRepository
{
    /**
     * Get all roles.
     *
     * @return Collection|Role[]
     */
    public function all()
    {
        return Role::all();
    }

    /**
     * Get role by the specific id.
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return Role::findOrFail($id);
    }
}
