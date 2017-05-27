<?php

Namespace EnergieProduction\Chart\Highcharts\Options;

use EnergieProduction\Chart\Highcharts\Highcharts;

Class XAxis extends Highcharts
{
	protected function setCategoriesAttribute(array $value = [])
	{
		$this->options['xAxis']['categories'] = $value;
	}

	protected function setLabelsAttribute(array $value = [])
	{
		$this->options['xAxis']['labels'] = ['style' => $value];
	}
}
