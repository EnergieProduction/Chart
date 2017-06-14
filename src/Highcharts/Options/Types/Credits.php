<?php

Namespace EnergieProduction\Chart\Highcharts\Options\Types;

use InvalidArgumentException;
use EnergieProduction\Chart\Highcharts\Type;

Class Credits extends Type
{
	protected function setEnabledProperty($value)
	{
		if (! is_bool($value)) {
			throw new InvalidArgumentException('Credits Enabled must be : boolean');
		}

		$this->options['enabled'] = $value;
	}
}
