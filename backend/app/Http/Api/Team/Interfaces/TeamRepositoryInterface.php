<?php

namespace App\Http\Api\Team\Interfaces;

/**
|--------------------------------------------------------------------------
| Team Repository Interface
|--------------------------------------------------------------------------
|
| This class is a type of interface, in which we are
| specify all methods for the repository.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
interface TeamRepositoryInterface
{
    /**
     * Get all teams with roles.
     *
     * @return mixed
     */
    public function all(): mixed;

    /**
     * Get team by the specific id.
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id): mixed;

    /**
     * Get all team users and roles.
     *
     * @param int $id
     * @return mixed
     */
    public function findAllRoles(int $id): mixed;

    /**
     * Get all team members.
     *
     * @param int $id
     * @return mixed
     */
    public function findMembers(int $id): mixed;

    /**
     * Get all team members by user.
     *
     * @param int $teamId
     * @param $user
     * @return mixed
     */
    public function findMembersByUser(int $teamId, $user): mixed;
}
