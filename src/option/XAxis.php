<?php

Namespace EnergieProduction\Chart\Option;

use EnergieProduction\Chart\Option\Option;

Class XAxis extends Option
{
	public function categories(array $value = [])
	{
		$this->options['xAxis'][__FUNCTION__] = $value;
	}

	public function tickWidth($value = null)
	{
		$this->options['xAxis'][__FUNCTION__] = $value;
	}

	public function gridLineWidth($value = null)
	{
		$this->options['xAxis'][__FUNCTION__] = $value;
	}

	public function labels(array $value = [])
	{
		$this->options['xAxis'][__FUNCTION__] = ['style' => $value];
	}
}