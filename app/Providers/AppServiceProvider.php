<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
//(3)
use Illuminate\Support\Facades\Schema;
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
        //(3)like this don't get error when do the migration
        Schema::defaultStringLength(191);
    }
}
