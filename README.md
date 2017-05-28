[![Latest Version on Packagist](https://img.shields.io/packagist/v/energieproduction/chart.svg?style=flat-square)](https://packagist.org/packages/energieproduction/chart)
[![Scrutinizer Code Quality](https://scrutinizer-ci.com/g/EnergieProduction/Chart/badges/quality-score.png?b=master)](https://scrutinizer-ci.com/g/EnergieProduction/Chart/?branch=master)
[![Total Downloads](https://img.shields.io/packagist/dt/energieproduction/chart.svg?style=flat-square)](https://packagist.org/packages/energieproduction/chart)

# EnergieProduction/Chart

Chart service for Highcharts on Laravel 5

## Installation

Run in console below command to download package to your project:
```
composer require energieproduction/chart
```

## Configuration
### For Laravel 5
In `/config/app.php` add ChartServiceProvider:
```
EnergieProduction\Chart\ChartServiceProvider::class,
```
Publish config settings:
```
php artisan vendor:publish
```
# Usage

The `make` method returns a formated JSON for Highcharts, use the `setOptions` method to save options and `setSeries` for series.

```php
$chart = app('chart');

$chart->setOption('title', function($o) {
    $o->text = 'Solar Employment Growth by Sector, 2010-2016';
    $o->align = 'left';
});

$chart->setOption('plotOptions', function($o) {
    $o->series = ['pointStart' => 2010];
});

$chart->setOption('yAxis', function($o) {
    $o->title = ['text' => 'Number of Employees'];
});

$chart->setSerie(function($s) {
    $s->name = 'Installation';
    $s->type = 'line';
    $s->data = [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175];
});

$chart->setSerie(function($s) {
    $s->name = 'Manufacturing';
    $s->type = 'line';
    $s->data = [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434];
});

$chart->render();
```


![Demo](https://i58.servimg.com/u/f58/11/13/61/32/chart310.png)

# Available options

All available options are visible in the folder `energieproduction\Chart\src\Highcharts`