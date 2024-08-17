<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Reposotory\UserRepositor;
use App\Reposotory\UserRepositoryInterface;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(UserRepositoryInterface::class,UserRepositor::class);
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
