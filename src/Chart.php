<?php

namespace EnergieProduction\Chart;

use Closure;

Class Chart
{
	protected $options = [];

	public function make(Closure $callback)
	{
		$this->callFunc($callback);

		return $this->options;
	}

	protected function callFunc($callback)
	{
		if ($callback instanceof Closure)
		{
			return call_user_func($callback, $this);
		}

		throw new Exception("Callback is not valid.");
	}

	public function setOption($option)
	{
		$this->options = $option;
	}
}