<?php

Namespace EnergieProduction\Chart;

use Closure;
use Exception;

Class Builder {

	public function __construct($class)
	{
		$this->class = $class;
	}

	public function make(Closure $callback)
	{
		$this->callFunc($callback, $this->class);

		return $this->class->render();
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