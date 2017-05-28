<?php

Namespace EnergieProduction\Chart\Highcharts\Options;

use EnergieProduction\Chart\Highcharts\Highcharts;

Class Legend extends Highcharts
{
	protected function setItemStyleAttribute(array $value)
	{
		$this->options['itemStyle'] = $value;
	}
}
