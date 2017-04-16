<?php

namespace EnergieProduction\Chart;

use Closure;
use Exception;

Class Chart
{
	protected $options = [];
	protected $series = [];

	public function make(Closure $callback)
	{
		$this->callFunc($callback);

		$options = array_merge($this->options, ['series' => $this->series]);

		return json_encode($options);
	}

	public function setOption($option)
	{
		$this->options = array_merge($this->options, $option);
	}

	public function setSerie($serie)
	{
		$this->series[] = $serie;
	}

	protected function callFunc($callback)
	{
		if ($callback instanceof Closure)
		{
			return call_user_func($callback, $this);
		}

		throw new Exception("Callback is not valid.");
	}
}