<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        // IP addresses to be whitelisted to show debugging for.
        if(in_array(get_ip_address(), [
            '127.0.0.1',
            '73.66.215.230', // Nick
            '96.71.229.83', // Nick Starbucks
        ])) {
            config(['app.debug' => true]);
        }
    }
}
