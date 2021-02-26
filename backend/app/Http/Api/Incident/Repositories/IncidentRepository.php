<?php

namespace App\Http\Api\Incident\Repositories;

use App\Http\Api\Incident\Models\Incident;

/**
|--------------------------------------------------------------------------
| Incident Repository
|--------------------------------------------------------------------------
|
| This class is a type of repository, in which we are
| getting database data connected with the incidents.
|
| @author David Ivanov <david4obgg1@gmail.com>
 */
class IncidentRepository
{
    /**
     * Obtain all incidents, also their callers and executors.
     *
     * @return mixed
     */
    private function incidents()
    {
        return Incident::with(['caller', 'executor']);
    }

    /**
     * Get incidents and sort them.
     *
     * @return mixed
     */
    public function all()
    {
        return $this->incidents()->orderBy('id')->get();
    }

    /**
     * Get incident by the specific id.
     *
     * @param int $id
     * @return mixed
     */
    public function findById(int $id)
    {
        return $this->incidents()->findOrFail($id);
    }
}
