<?php

Namespace EnergieProduction\Chart\Highcharts\Options;

use InvalidArgumentException;
use EnergieProduction\Chart\Highcharts\Highcharts;

Class Credits extends Highcharts
{
	protected function setEnabledAttribute($value)
	{
		if (! is_bool($value)) {
			throw new InvalidArgumentException('Credits Enabled must be : boolean');
		}

		$this->options['enabled'] = $value;
	}
}
