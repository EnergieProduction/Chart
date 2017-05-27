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
        $this->publishesConfig();
    }

    public function register()
    {
        $this->app->bind('chart', function($app) {

            $builder = new Builder();

            $config = config('charts');

            return new Chart($builder, $config);
        });
    }

    protected function publishesConfig()
    {
        $this->publishes([
            __DIR__.'/Config/charts.php' => config_path('charts.php'),
        ]);
    }
}