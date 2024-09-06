<?php

namespace App\Providers;

use App\Contracts\Interfaces\KanbanInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\TeamInterface;
use App\Contracts\Repositories\KanbanRepository;
use App\Contracts\Repositories\ProjectRepository;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Repositories\TeamRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        ProjectInterface::class => ProjectRepository::class,
        UserInterface::class => UserRepository::class,
        KanbanInterface::class => KanbanRepository::class,
    ];
    /**
     * Register any application services.
     */
    public function register(): void
    {
        foreach ($this->register as $index => $value) {
            $this->app->bind($index, $value);
        }
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
