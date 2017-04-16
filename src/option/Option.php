<?php

Namespace EnergieProduction\Chart\Option;

use EnergieProduction\Chart\Option\OptionContract;

abstract class Option implements OptionContract
{
	protected $options = [];
	protected $pattern = [];

	public function render()
	{
		return array_merge($this->pattern, $this->options);
	}

	public function pattern($value)
	{
		$value = (is_array($value)) ? $value : [$value] ;

		$this->pattern = $value;
	}
}