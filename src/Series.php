<?php

namespace EnergieProduction\Chart;

use EnergieProduction\Chart\Exceptions\UnavailableSerieException;

Class Series
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
			throw new UnavailableSerieException;
		}

		$optionClass = $this->makeClass($type);

		$builder = new Builder($optionClass);

		return ['type' => $type] + $builder->make($callback);
	}

	protected function makeClass($type)
	{
		$className = ucfirst($type);

		$class = __NAMESPACE__ . "\\Highcharts\\Series\\$className";

		$config = $this->config['available_types'][$type];

		return new $class($config);
	}
}
