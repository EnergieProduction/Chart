<?php

Namespace EnergieProduction\Chart\Highcharts\Options;

use EnergieProduction\Chart\Highcharts\Highcharts;

Class YAxis extends Highcharts
{
	protected function setLabelsAttribute(array $value)
	{
		$this->options['labels'] = $value;
	}

	protected function setTitleAttribute(array $value)
	{
		$this->options['title'] = $value;
	}
}
