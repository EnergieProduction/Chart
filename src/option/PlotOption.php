<?php

Namespace EnergieProduction\Chart\Option;

use EnergieProduction\Chart\Option\Option;

Class PlotOption extends Option
{
	public function plotOption($value = null)
	{
		$this->options['plotOption'][__FUNCTION__] = $value;
	}

	public function shared($value = true)
	{
		$this->options['plotOption'][__FUNCTION__] = $value;
	}

	public function valueSuffix($value = null)
	{
		$this->options['plotOption'][__FUNCTION__] = $value;
	}
}