<?php

Namespace EnergieProduction\Chart\Highcharts\Options\Types;

use EnergieProduction\Chart\Highcharts\Type;

Class Chart extends Type
{
	protected function setStyleProperty(array $value)
	{
		$this->options['style'] = ['style' => $value];
	}
}
