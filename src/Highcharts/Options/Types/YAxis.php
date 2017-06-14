<?php

Namespace EnergieProduction\Chart\Highcharts\Options\Types;

use EnergieProduction\Chart\Highcharts\Type;

Class YAxis extends Type
{
	protected function setLabelsProperty(array $value)
	{
		$this->options['labels'] = $value;
	}

	protected function setTitleProperty(array $value)
	{
		$this->options['title'] = $value;
	}
}
