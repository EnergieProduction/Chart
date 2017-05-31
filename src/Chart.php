<?php

namespace EnergieProduction\Chart;

use Closure;
use Exception;
use EnergieProduction\Chart\Exceptions\UnavailableOptionException;

Class Chart
{
	protected $chart = [];
	protected $config = [];
	protected $builder;

	public function __construct($builder, array $config)
	{
		$this->builder = $builder;
		$this->config = $config;
		$this->chart = [
			'options' => [],
			'series' => [],
		];
	}

	public function setOption($type, $callback)
	{
		$availableTypes = array_keys($this->config['options']['available_types']);

		if (! in_array($type, $availableTypes)) {
			throw new UnavailableOptionException;
		}

		$this->builder->setOption($type, $this->config['options']['available_types'][$type]);

		$formattedOption = [$type => $this->builder->make($callback)];

		$this->chart['options'] = array_merge($this->chart['options'], $formattedOption);
	}

	public function setSerie($callback)
	{
		$this->builder->setSerie($this->config['series']['available_types']);

		$this->chart['series'][] = $this->builder->make($callback);
	}

	public function render()
	{
		$options = array_merge($this->chart['options'], ['series' => $this->chart['series']]);

		return json_encode($options);
	}
}
