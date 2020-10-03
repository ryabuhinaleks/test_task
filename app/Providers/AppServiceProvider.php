<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\EventRepository;
use App\Repositories\Interfaces\EventRepositoryInterface;

use App\Repositories\CalendarRepository;
use App\Repositories\Interfaces\CalendarRepositoryInterface;

use App\Repositories\AccountRepository;
use App\Repositories\Interfaces\AccountRepositoryInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(EventRepositoryInterface::class, EventRepository::class);

        $this->app->bind(CalendarRepositoryInterface::class, CalendarRepository::class);

        $this->app->bind(AccountRepositoryInterface::class, AccountRepository::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
