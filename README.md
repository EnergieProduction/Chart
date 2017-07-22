 
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
 
Do not forget to use the scripts from Highcharts on the pages that contains a chart
 
```php
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
```
 
# Usage
 
In progress...

# Examples
 
```php
$chart = app('EnergieProduction\Chart');

$chart->addSubset('title', function($title){
    $title->pushCriteria(new Criterias\Text('Solar Employment Growth by Sector, 2010-2016'));
});

$chart->addSubset('subtitle', function($subtitle){
    $subtitle->pushCriteria(new Criterias\Text('Source: thesolarfoundation.com'));
});

$chart->addSubset('yAxis.title', function($title){
    $title->pushCriteria(new Criterias\Text('Number of Employees'));
});

$chart->addSubset('legend', function($legend){
    $legend->pushCriteria(new Criterias\Layout('vertical'));
    $legend->pushCriteria(new Criterias\Align('right'));
    $legend->pushCriteria(new Criterias\VerticalAlign('middle'));
});

$chart->addSubset('plotOptions.series', function($plotOptions){
    $plotOptions->pushCriteria(new Criterias\PointStart(2010));
});

$chart->addSubset('series', function($series){
    $series->pushCriteria(new Criterias\Name('Installation'));
    $series->pushCriteria(new Criterias\Data([43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175]));
});

$chartSolarEmployment = $chart->render();

```
 
```php
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
 
<div id='chart'></div>
 
<script type="text/javascript">
$(function () {
    $('chart').highcharts({{$chartSolarEmployment}});
});
</script>
```
 
![Demo](https://i11.servimg.com/u/f11/11/13/61/32/charts10.png)
