<?php

Namespace EnergieProduction\Chart\Highcharts\Options;

use EnergieProduction\Chart\Highcharts\Highcharts;

Class PlotOptions extends Highcharts
{
	protected function setSeriesAttribute(array $value)
	{
		$this->options['series'] = $value;
	}
}
