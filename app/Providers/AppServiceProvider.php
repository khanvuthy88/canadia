<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Customer;
use App\Observers\CreateAccountObserver;
class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        Customer::observe(CreateAccountObserver::class);
    }
}
