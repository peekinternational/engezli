<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class EngezliProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {

       $this->app->bind('Engezli', function(){
            return new \App\Classes\Engezli;
        });
    }
}
