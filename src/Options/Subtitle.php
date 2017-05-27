<?php

Namespace EnergieProduction\Chart\Options;

use EnergieProduction\Chart\Options\Option;

Class Subtitle extends Option
{
	public function text($value = null)
	{
		$this->options['subtitle'][__FUNCTION__] = $value;
	}

	public function style(array $value = [])
	{
		$this->options['subtitle'][__FUNCTION__] = ['style' => $value];
	}
}