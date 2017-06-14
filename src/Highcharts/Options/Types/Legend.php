<?php

Namespace EnergieProduction\Chart\Highcharts\Options\Types;

use EnergieProduction\Chart\Highcharts\Type;

Class Legend extends Type
{
	protected function setItemStyleProperty(array $value)
	{
		$this->options['itemStyle'] = $value;
	}
}
