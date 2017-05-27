<?php

Namespace EnergieProduction\Chart\Options;

use EnergieProduction\Chart\Options\Option;

Class YAxis extends Option
{
	public function text($value = null)
	{
		$this->options['yAxis'][__FUNCTION__] = $value;
	}

	public function labels(array $value = [])
	{
		$this->options['yAxis'][__FUNCTION__] = $value;
	}

	public function showFirstLabel($value = false)
	{
		$this->options['yAxis'][__FUNCTION__] = $value;
	}
}