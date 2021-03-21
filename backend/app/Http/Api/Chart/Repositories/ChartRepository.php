<?php

namespace App\Http\Api\Chart\Repositories;

use App\Http\Api\Chart\Interfaces\ChartRepositoryInterface;
use App\Http\Api\Chart\Models\Chart;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
class ChartRepository implements ChartRepositoryInterface
{
    /** @inheritDoc */
    public function all(): array|Collection
    {
        return Chart::with('roles')->get();
    }

    /** @inheritDoc */
    public function findById(int $id): array|Collection|Model|Chart
    {
        return Chart::findOrFail($id);
    }
}
