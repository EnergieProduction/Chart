<?php

Namespace EnergieProduction\Chart;

use Closure;
use Exception;
use EnergieProduction\Chart\Exceptions\BuilderNotReadyException;
use EnergieProduction\Chart\Exceptions\CallbackNotValidException;

Class Builder {

	protected $class;

	public function setOption($class, array $config)
	{
		$className = ucfirst($class);

		$class = __NAMESPACE__ . "\\Highcharts\\Options\\$className";

		$this->class = new $class($config);
	}

	public function setSerie($class, array $config)
	{
		$className = ucfirst($class);

		$class = __NAMESPACE__ . "\\Highcharts\\Series\\$className";

		$this->class = new $class($config);
	}

	public function make($callback)
	{
		if (! $this->class) {
			throw new BuilderNotReadyException;
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
