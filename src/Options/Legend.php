<?php

Namespace EnergieProduction\Chart\Options;

use EnergieProduction\Chart\Options\Option;

Class Legend extends Option
{
	public function itemStyle(array $value = [])
	{
		$this->options['legend'][__FUNCTION__] = $value;
	}
}