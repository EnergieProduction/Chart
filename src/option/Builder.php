<?php

Namespace EnergieProduction\Chart\Option;

use Closure;
use EnergieProduction\Chart\Option\OptionContract;

Class Builder {

	public function __construct(OptionContract $option)
	{
		$this->option = $option;
	}

	public function make(Closure $callback)
	{
		$this->callFunc($callback, $this->option);

		return $this->option->render();
	}

	protected function callFunc($callback, $option)
	{
		if ($callback instanceof Closure)
		{
			return call_user_func($callback, $option);
		}

		throw new Exception("Callback is not valid.");
	}
}