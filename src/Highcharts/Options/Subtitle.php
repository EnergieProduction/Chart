<?php

Namespace EnergieProduction\Chart\Highcharts\Options;

use EnergieProduction\Chart\Highcharts\Highcharts;

Class Subtitle extends Highcharts
{
	protected function setStyleAttribute(array $value)
	{
		$this->options['style'] = ['style' => $value];
	}
}
