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

# Usage

The `make` method returns a formated JSON for Highcharts, use the `setOptions` method to save options and `setSeries` for series.

```php
$chart = app('chart')->make(function($c) {

    $c->setOption(app('option.title')->make(function($o) {
        $o->text('Title');
    }));

    $c->setSerie(app('serie')->make(function($s) {
        $s->name('Serie title');
        $s->type('line');
        $s->data([1,2,3,4]);
    }));
});

// "{
//  "title":{
//      "text":"Title"
//  },
//  "series":[{
//      "name":"Serie title",
//      "type":"line",
//      "data":[1,2,3,4]
//  }]
// }"
```

# Available options

All available options are visible in the folder `energieproduction\Chart\src\option`