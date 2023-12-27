<?php

namespace App\Providers;

use App\Contracts\EloquentRepositoryContract;
use App\Contracts\TodoRepositoryContract;
use App\Repositories\Repository;
use App\Repositories\TodoRepository;
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
        $this->app->bind(EloquentRepositoryContract::class, Repository::class);
        $this->app->bind(TodoRepositoryContract::class, TodoRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
