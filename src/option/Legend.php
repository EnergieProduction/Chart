<?php

Namespace EnergieProduction\Chart\Option;

use EnergieProduction\Chart\Option\Option;

Class Legend extends Option
{
	public function itemStyle(array $value = [])
	{
		$this->options['legend'][__FUNCTION__] = $value;
	}
}