<?php

namespace App\Providers;

use App\Parcel;
use App\User;

use Illuminate\Support\ServiceProvider;
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
        Parcel::observe( \App\Observers\ParcelObserver::class );
        User::observe( \App\Observers\UserObserver::class );
        Schema::defaultStringLength(191);
    }
}
