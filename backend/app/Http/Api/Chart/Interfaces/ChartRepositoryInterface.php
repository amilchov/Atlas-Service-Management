<?php

namespace App\Http\Api\Chart\Interfaces;

/**
|--------------------------------------------------------------------------
| Chart Repository Interface
|--------------------------------------------------------------------------
|
| This class is a type of interface, in which we are
| specify all methods for the repository.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
interface ChartRepositoryInterface
{
    /**
     * Get all charts.
     *
     * @return mixed
     */
    public function all(): mixed;

    /**
     * Find chart by specific id.
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id): mixed;
}
