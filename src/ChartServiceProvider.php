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
        $this->app->bind('option.title', function($app) {
            return new Builder(new Option\Title);
        });

        $this->app->bind('option.subtitle', function($app) {
            return new Builder(new Option\Subtitle);
        });

        $this->app->bind('option.plotOption', function($app) {
            return new Builder(new Option\PlotOption);
        });

        $this->app->bind('option.xAxis', function($app) {
            return new Builder(new Option\XAxis);
        });

        $this->app->bind('option.yAxis', function($app) {
            return new Builder(new Option\YAxis);
        });

        $this->app->bind('serie', function($app) {
            return new Builder(new Serie\Serie);
        });

        $this->app->bind('chart', function($app) {
            return new Chart();
        });
    }

    public function register()
    {
        //
    }
}