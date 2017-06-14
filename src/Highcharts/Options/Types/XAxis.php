<?php

Namespace EnergieProduction\Chart\Highcharts\Options\Types;

use EnergieProduction\Chart\Highcharts\Type;

Class XAxis extends Type
{
	protected function setCategoriesProperty(array $value)
	{
		$this->options['categories'] = $value;
	}

	protected function setLabelsProperty(array $value)
	{
		$this->options['labels'] = ['style' => $value];
	}

	protected function setTitleProperty(array $value)
	{
		$this->options['title'] = $value;
	}
}
