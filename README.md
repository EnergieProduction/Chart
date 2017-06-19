 
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
 
Do not forget to use the scripts from Highcharts on the pages that contains a chart
 
```php
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/highcharts-more.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
```
 
# Usage
 
## setOption
 
Prepare the settings related to the charts
 
```php
$chart->setOption(string $type, closure);
```
 
|  Param | Description  |
|---|---|
| string $type  | type of option [lists of settings and properties associated](#user-content-settings--properties-associated)  |
| closure  | closure in order to acces the properties of the option |
 
### Examples
 
```php
$chart->setOption('title', function($o) {
 
    $o->text = 'chart title';
    $o->align = 'left',
    $o->style = ['fontFamily' => 'Karla, sans-serif'],
 
});
```
 
## setSerie
 
Prepare the data set
 
```php
$chart->setSerie(string $type, closure);
```
 
|  Param | Description  |
|---|---|
| string $type  | type of series [lists of series and properties associated](#user-content-override-the-parameters)  |
| closure  | closure in order to acces the properties of the series|
 
### Examples
 
```php
$chart->setSerie('line', function($s) {
 
    $s->name = 'Serie title';
    $s->data = [1,2,3,4];
 
});
```
 
## render
 
Generate a Json formatted for Highcharts
 
```php
$chart->render();
```
 
# Pattern

To factorize the creation of your series and settings, the ```pattern``` method accepts an ```array``` that includes a setup of properties.
 
```php
 
$pattern = [
    'align' => 'left',
    'style' => ['fontFamily' => 'Karla, sans-serif'],
];
 
$chart->setOption('title', function($o) use($pattern) {
 
    $o->text = 'chart title';
    $o->pattern($pattern);
 
});
```
 
# Examples
 
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
 
$chart->setSerie('line', function($s) {
    $s->name = 'Installation';
    $s->data = [43934, 52503, 57177, 69658, 97031, 119931, 137133, 154175];
});
 
$chart->setSerie('line', function($s) {
    $s->name = 'Manufacturing';
    $s->data = [24916, 24064, 29742, 29851, 32490, 30282, 38121, 40434];
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
 
![Demo](https://i58.servimg.com/u/f58/11/13/61/32/chart310.png)
 
# Settings & Properties associated
 
|  Settings | Properties  |
|---|---|
| title  |[text](http://api.highcharts.com/highcharts/title.text), [align](http://api.highcharts.com/highcharts/title.align), [style](http://api.highcharts.com/highcharts/title.style)|
| legend |[itemStyle](http://api.highcharts.com/highcharts/legend.itemStyle)|
| plotOptions |[plotOption](http://api.highcharts.com/highcharts/plotOptions.plotOption), [shared](http://api.highcharts.com/highcharts/plotOptions.shared), [valueSuffix](http://api.highcharts.com/highcharts/plotOptions.valueSuffix), [series](http://api.highcharts.com/highcharts/plotOptions.series)|
| subtitle |[text](http://api.highcharts.com/highcharts/subtitle.text), [style](http://api.highcharts.com/highcharts/subtitle.style)|
| xAxis |[title](http://api.highcharts.com/highcharts/xAxis.title), [categories](http://api.highcharts.com/highcharts/xAxis.categories), [tickWidth](http://api.highcharts.com/highcharts/xAxis.tickWidth), [gridLineWidth](http://api.highcharts.com/highcharts/xAxis.gridLineWidth), [labels](http://api.highcharts.com/highcharts/xAxis.labels)|
| yAxis |[title](http://api.highcharts.com/highcharts/yAxis.title), [label](http://api.highcharts.com/highcharts/yAxis.label), [showFirstLabel](http://api.highcharts.com/highcharts/yAxis.showFirstLabel)|
| chart |[style](http://api.highcharts.com/highcharts/chart.style), [backgroundColor](http://api.highcharts.com/highcharts/chart.backgroundColor), [borderColor](http://api.highcharts.com/highcharts/chart.borderColor), [borderRadius](http://api.highcharts.com/highcharts/chart.borderRadius), [borderWidth](http://api.highcharts.com/highcharts/chart.borderWidth), [marginTop](http://api.highcharts.com/highcharts/chart.marginTop), [className](http://api.highcharts.com/highcharts/chart.className)|
| credits |[enabled](http://api.highcharts.com/highcharts/credits.enabled)|
 
# Series & properties associated
 
|  Series | Properties  |
|---|---|
| line  |[name](http://api.highcharts.com/highcharts/series<line>--softThreshold), [data](http://api.highcharts.com/highcharts/series<line>--data), [zIndex](http://api.highcharts.com/highcharts/series<line>--zIndex), [color](http://api.highcharts.com/highcharts/series<line>--color), [type](http://api.highcharts.com/highcharts/series<line>--type), [fillOpacity](http://api.highcharts.com/highcharts/series<line>--fillOpacity), [lineWidth](http://api.highcharts.com/highcharts/series<line>--lineWidth)|
  
# Override the parameters

The list of settings & series availables as well as their properties associateds are accessible in the setting file ```config/charts.php```. If a wished property is missing, you could still add it directly into the file.
 
```php
return [
    'options' => [
        'available_types' => [
            'title' => ['text', 'align', 'style', 'myNewSetting'],
            //
        ]
        //
    ]
    //
];
 
# exemple
 
$chart->setOption('title', function($o) {
 
    $o->myNewSetting = '...';
 
});
 
// {"title":{"myNewSetting":"..."}}
 
 
```
 
Still, it's not possible to add a new type of setting or serie.
