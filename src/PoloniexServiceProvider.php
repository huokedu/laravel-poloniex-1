<?php

namespace Thosuperman\Poloniex;

use Illuminate\Support\ServiceProvider;

class PoloniexServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/../config/poloniex.php' => config_path('poloniex.php')
        ], 'config');
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('poloniex', function () {
            return new PoloniexManager;
        });
    }
}