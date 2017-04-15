<?php

Namespace EnergieProduction\Chart\Option;

use EnergieProduction\Chart\Option\Option;

Class Title extends Option
{
	public function text($value = null)
	{
		$this->options['title'][__FUNCTION__] = $value;
	}

	public function align($value = null)
	{
		$this->options['title'][__FUNCTION__] = $value;
	}

	public function style(array $value = [])
	{
		$this->options['title'][__FUNCTION__] = ['style' => $value];
	}
}