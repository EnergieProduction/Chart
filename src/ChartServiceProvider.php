<?php

namespace EnergieProduction\Chart;

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
        // Get namespace
        $nameSpace = $this->app->getNamespace();
    }

    public function register() {}
}