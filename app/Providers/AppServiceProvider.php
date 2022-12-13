<?php

namespace App\Providers;

use App\Http\Services\NotificatorInterface;
use App\Notifications\TgNotification;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {

        $this->app->bind(NotificatorInterface::class,TgNotification::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     *
     */
    public function boot()
    {
        //
    }
}
