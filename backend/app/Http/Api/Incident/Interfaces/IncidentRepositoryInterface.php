<?php

namespace App\Http\Api\Incident\Interfaces;

/**
|--------------------------------------------------------------------------
| Incident Repository Interface
|--------------------------------------------------------------------------
|
| This class is a type of interface, in which we are
| specify all methods for the repository.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
interface IncidentRepositoryInterface
{
    /**
     * Get incidents and sort them.
     *
     * @return mixed
     */
    public function all(): mixed;

    /**
     * Get incident by the specific id.
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id): mixed;

    /**
     * Get incident by the specific id.
     *
     * @return mixed
     */
    public function findLatestNumber(): mixed;
}
