<?php

namespace App\Providers;

use App\Http\Api\Chart\Interfaces\ChartRepositoryInterface;
use App\Http\Api\Chart\Repositories\ChartRepository;
use App\Http\Api\Incident\Interfaces\IncidentRepositoryInterface;
use App\Http\Api\Incident\Repositories\IncidentRepository;
use App\Http\Api\Role\Interfaces\RoleRepositoryInterface;
use App\Http\Api\Role\Repositories\RoleRepository;
use App\Http\Api\Team\Interfaces\TeamRepositoryInterface;
use App\Http\Api\Team\Repositories\TeamRepository;
use App\Http\Api\User\Interfaces\UserRepositoryInterface;
use App\Http\Api\User\Repositories\UserRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register(): void
    {
        $this->app->bind(UserRepositoryInterface::class, UserRepository::class);
        $this->app->bind(ChartRepositoryInterface::class, ChartRepository::class);
        $this->app->bind(IncidentRepositoryInterface::class, IncidentRepository::class);
        $this->app->bind(RoleRepositoryInterface::class, RoleRepository::class);
        $this->app->bind(TeamRepositoryInterface::class, TeamRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
