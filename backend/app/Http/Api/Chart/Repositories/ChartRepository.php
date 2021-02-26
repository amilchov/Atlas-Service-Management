<?php

namespace App\Http\Api\Chart\Repositories;

use App\Http\Api\Chart\Models\Chart;

/**
|--------------------------------------------------------------------------
| Chart Repository
|--------------------------------------------------------------------------
|
| This class is a type of repository, in which we are
| getting database data connected with the charts.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class ChartRepository
{
    /**
     * Get all charts.
     *
     * @return mixed
     */
    public function all()
    {
        return Chart::with('roles')->get();
    }

    /**
     * Find chart by specific id.
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return Chart::findOrFail($id);
    }
}
