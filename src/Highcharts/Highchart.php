<?php

namespace EnergieProduction\Chart\Highcharts;

use EnergieProduction\Chart\Builder;
use EnergieProduction\Chart\Exceptions\UnavailableTypeException;

abstract Class Highchart
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
			throw new UnavailableTypeException;
		}

		$typeClass = $this->makeTypeClass($type);

		$builder = new Builder($typeClass);

		return $builder->make($callback);
	}

	protected function makeTypeClass($type)
	{
		$className = ucfirst($type);

		$class = static::path . $className;

		$config = $this->config['available_types'][$type];

		return new $class($config);
	}
}
