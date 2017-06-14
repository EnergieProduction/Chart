<?php

Namespace EnergieProduction\Chart\Highcharts\Options\Types;

use EnergieProduction\Chart\Highcharts\Type;

Class PlotOptions extends Type
{
	protected function setSeriesProperty(array $value)
	{
		$this->options['series'] = $value;
	}
}
