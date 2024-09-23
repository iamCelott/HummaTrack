<?php

namespace App\Providers;

use App\Models\Team;
use App\Policies\TeamPolicy;
use Illuminate\Support\ServiceProvider;
use App\Contracts\Interfaces\TaskInterface;
use App\Contracts\Interfaces\TeamInterface;
use App\Contracts\Interfaces\UserInterface;
use App\Contracts\Interfaces\KanbanInterface;
use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Repositories\TaskRepository;
use App\Contracts\Repositories\TeamRepository;
use App\Contracts\Repositories\UserRepository;
use App\Contracts\Repositories\KanbanRepository;
use App\Contracts\Interfaces\DepartmentInterface;
use App\Contracts\Interfaces\TaskDetailInterface;
use App\Contracts\Repositories\ProjectRepository;
use App\Contracts\Repositories\DepartmentRepository;
use App\Contracts\Repositories\TaskDetailRepository;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        ProjectInterface::class => ProjectRepository::class,
        UserInterface::class => UserRepository::class,
        KanbanInterface::class => KanbanRepository::class,
        TaskInterface::class => TaskRepository::class,
        TaskDetailInterface::class => TaskDetailRepository::class,
        TeamInterface::class => TeamRepository::class,
        DepartmentInterface::class => DepartmentRepository::class
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
