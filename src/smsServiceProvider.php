<?php

namespace Tasar\SMS;

use Illuminate\Support\ServiceProvider;

class smsServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind('tasar-sms', function () {
            return new SMS;
        });

        $this->mergeConfigFrom(__DIR__ . '/Config/tasarsms.php', 'tasarsms');

        require_once __DIR__ . '/Helpers/helpers.php';
    }

    public function boot()
    {
        $this->publishes([
            __DIR__ . '/Config/tasarsms.php' => config_path('tasarsms.php')
        ], 'tasarsms-config');

        $this->publishes([
            __DIR__ . '/Database/migrations/create_tasarsms_table.php.stub' => database_path('migrations/' . date('Y_m_d_His', time()) . '_create_tasarsms_table.php'),
        ], 'tasarsms-migrations');
    }
}
