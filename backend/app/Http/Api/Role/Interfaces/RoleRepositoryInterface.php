<?php

namespace App\Http\Api\Role\Interfaces;

use Illuminate\Database\Eloquent\Collection;
use Spatie\Permission\Models\Role;

/**
|--------------------------------------------------------------------------
| Role Repository Interface
|--------------------------------------------------------------------------
|
| This class is a type of interface, in which we are
| specify all methods for the repository.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
interface RoleRepositoryInterface
{
    /**
     * Get all roles.
     *
     * @return mixed
     */
    public function all(): mixed;

    /**
     * Get role by the specific id.
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id): mixed;
}
