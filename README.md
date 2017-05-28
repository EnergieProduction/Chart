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

    $o->text = 'Titre';
    $o->align = 'left';
    $o->style = ['fontFamily' => 'Karla, sans-serif'];

});

$chart->setSerie(function($s) {

    $s->name = 'Serie 1';
    $s->type = 'line';
    $s->color = '#ff0000';
    $s->data = [1,2,3,4];

});

$chart->render();
```

# Available options

All available options are visible in the folder `energieproduction\Chart\src\Highcharts`