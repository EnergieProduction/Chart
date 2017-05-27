<?php

Namespace EnergieProduction\Chart\Highcharts\Options;

use EnergieProduction\Chart\Highcharts\Highcharts;

Class Title extends Highcharts
{
	protected function setStyleAttribute(array $value = [])
	{
		$this->options['title']['style'] = ['style' => $value];
	}
}
