<?php

Namespace EnergieProduction\Chart\Highcharts\Options;

use EnergieProduction\Chart\Highcharts\Highcharts;

Class YAxis extends Highcharts
{
	protected function setLabelsAttribute(array $value = [])
	{
		$this->options['yAxis']['labels'] = $value;
	}
}
