<?php

namespace App\Providers;

use App\Repositories\{SupportRepositoryInterface, SupportEnloquentORM};
use Illuminate\Support\{ServiceProvider};

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        $this->app->bind(SupportRepositoryInterface::class, SupportEnloquentORM::class);
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        //
    }
}
