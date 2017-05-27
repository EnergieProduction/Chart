<?php

Namespace EnergieProduction\Chart\Highcharts\Series;

use EnergieProduction\Chart\Highcharts\Highcharts;

Class Serie extends Highcharts {

	protected function setDataAttribute(array $value = [])
	{
		$this->options['data'] = $value;
	}
}
