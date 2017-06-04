<?php

namespace EnergieProduction\Chart;

use EnergieProduction\Chart\Exceptions\UnavailableOptionException;

Class Options
{
	protected $config = [];

	public function __construct(array $config)
	{
		$this->config = $config;
	}

	public function make($type, $callback)
	{
		$availableTypes = array_keys($this->config['available_types']);

		if (! in_array($type, $availableTypes)) {
			throw new UnavailableOptionException;
		}

		$optionClass = $this->makeClass($type);

		$builder = new Builder($optionClass);

		return $builder->make($callback);
	}

	protected function makeClass($type)
	{
		$className = ucfirst($type);

		$class = __NAMESPACE__ . "\\Highcharts\\Options\\$className";

		$config = $this->config['available_types'][$type];

		return new $class($config);
	}
}
