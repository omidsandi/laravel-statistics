<?php

namespace OmidSandi\Statistics;

use Illuminate\Support\ServiceProvider;


class StatisticsServiceProvider extends ServiceProvider{
    public function register()
    {
        $this->app->bind('statistics', function () {
            return new Statistics;
        });
    }

    public function boot()
    {
        $this->publishes([
            __DIR__.'/Migrations/'=>database_path('migrations')
        ]);
    }
}
