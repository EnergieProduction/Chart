<?php

Namespace EnergieProduction\Chart;

use Closure;
use Exception;
use EnergieProduction\Chart\Exceptions\CallbackNotValidException;

Class Builder {

	protected $class;

	public function __construct($class)
	{
		$this->class = $class;
	}

	public function make($callback)
	{
		$this->callFunc($callback, $this->class);

		return $this->class->render();
	}

	protected function callFunc($callback, $option)
	{
		if (! $callback instanceof Closure)
		{
			throw new CallbackNotValidException();
		}

		return call_user_func($callback, $option);
	}
}
