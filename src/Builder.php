<?php

Namespace EnergieProduction\Chart;

use Closure;
use Exception;
use EnergieProduction\Chart\Exceptions\CallbackNotValidException;
use EnergieProduction\Chart\Exceptions\NoClassInstanciedException;

Class Builder {

	protected $class;

	public function setOption($class, $options)
	{
		$className = ucfirst($class);

		$class = __NAMESPACE__ . "\\Options\\$className";

		$this->class = new $class($options);
	}

	public function setSerie()
	{
		$class = __NAMESPACE__ . "\\Series\\Serie";

		$this->class = new $class;
	}

	public function make($callback)
	{
		if (! $this->class) {
			throw new NoClassInstanciedException;
		}

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
