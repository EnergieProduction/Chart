<?php

namespace EnergieProduction\Chart;

use Illuminate\Support\Collection;
use Illuminate\Support\ServiceProvider;

class ChartServiceProvider extends ServiceProvider{

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    public function boot()
    {
        //
    }

    public function register()
    {
        $this->app->bind('chart', function($app) {
            return new Chart();
        });
    }
}



