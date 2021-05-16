<?php

namespace App\Http\Api\Team\Repositories;

use App\Http\Api\Team\Interfaces\TeamRepositoryInterface;
use App\Http\Api\Team\Models\Membership;
use App\Http\Api\Team\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

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
class TeamRepository implements TeamRepositoryInterface
{
    /** @inheritDoc */
    public function all(): array|Collection|Builder
    {
        return Team::with(['users', 'roles', 'incidents'])->get();
    }

    /** @inheritDoc */
    public function findById(int $id): array|Collection|Model|Team
    {
        return Team::findOrFail($id);
    }

    /** @inheritDoc */
    public function findAllRoles(int $id): array|null|Collection|Model|Builder
    {
        return Team::with(['users', 'roles'])->findOrFail($id);
    }

    /** @inheritDoc */
    public function findMembers(int $id): array|Collection
    {
        return Membership::where('team_id', $id)->get();
    }

    /** @inheritDoc */
    public function findMembersByUser(int $teamId, $user): array|Collection
    {
        return Membership::where(['team_id' => $teamId, 'user_id' => $user])->get();
    }
}
