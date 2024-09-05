<?php

namespace App\Providers;

use App\Contracts\Interfaces\ProjectInterface;
use App\Contracts\Repositories\ProjectRepository;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    private array $register = [
        ProjectInterface::class => ProjectRepository::class,
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
