<?php

namespace Tasar\SMS;

use Illuminate\Support\ServiceProvider;

class smsServiceProvider extends ServiceProvider
{
    public function register()
    {
        // Facade //
        $this->app->bind('tasar-sms', function () {
            return new SMS;
        });

        $this->mergeConfigFrom(
            __DIR__ . '/Config/tasarsms.php', 'tasarsms'
        );

        /*--------------------------------------------------------------------------
        | Register helpers.php functions
        |--------------------------------------------------------------------------*/
        require_once __DIR__ . '/Helpers/helpers.php';
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/tasarsms.php' => config_path('tasarsms.php')
        ], 'config');
    }
}