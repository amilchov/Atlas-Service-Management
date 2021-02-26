<?php

namespace App\Http\Api\Team\Repositories;

use App\Http\Api\Team\Models\Team;

/**
|--------------------------------------------------------------------------
| Team Repository
|--------------------------------------------------------------------------
|
| This class is a type of repository, in which we are
| getting database data connected with the teams.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class TeamRepository
{
    /**
     * Get all teams with roles.
     *
     * @return mixed
     */
    public function all()
    {
        return Team::with(['users', 'roles'])->get();
    }

    /**
     * Get team by the specific id.
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return Team::findOrFail($id);
    }

    /**
     * Get all roles for that team.
     *
     * @param int $id
     * @return mixed
     */
    public function findAllRoles(int $id)
    {
        return Team::with(['users', 'roles'])->findOrFail($id);
    }
}
