<?php

namespace App\Http\Api\Incident\Repositories;

use App\Http\Api\Incident\Interfaces\IncidentRepositoryInterface;
use App\Http\Api\Incident\Models\Incident;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
class IncidentRepository implements IncidentRepositoryInterface
{
    /** @inheritDoc */
    public function all(): array|Collection
    {
        return Incident::with(['caller', 'executor'])->orderBy('id')->get();
    }

    /** @inheritDoc */
    public function findById(int $id): array|null|Collection|Model|Builder
    {
        return Incident::with(['caller', 'executor'])->findOrFail($id);
    }

    /** @inheritDoc */
    public function findLatestNumber(): mixed
    {
        return Incident::latest('id')->value('number');
    }
}
