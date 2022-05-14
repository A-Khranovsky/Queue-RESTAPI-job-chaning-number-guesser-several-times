<?php

namespace App\Providers;

use App\Services\HomeControllerService;
use App\Services\HomeControllerServiceInterface;
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
        $this->app->singleton(HomeControllerServiceInterface::class, function(){
            return new HomeControllerService();
        });
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
