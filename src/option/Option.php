<?php

Namespace EnergieProduction\Chart\Option;

use EnergieProduction\Chart\Option\OptionContract;

Class Option implements OptionContract
{
	protected $options = [];
	protected $pattern = [];

	public function render()
	{
		$options = array_merge($this->pattern, $this->options);

		return json_encode($options);
	}

	public function pattern($value)
	{
		$value = (is_array($value)) ? $value : [$value] ;

		$this->pattern = $value;
	}
}