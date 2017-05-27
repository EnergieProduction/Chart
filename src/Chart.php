<?php

namespace EnergieProduction\Chart;

use Closure;
use Exception;

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

	public function setOption($type, $option)
	{
		$availableTypes = array_keys($this->config['available_types']);

		if (! in_array($type, $availableTypes)) {
			throw new UnavailableOptionType;
		}

		$this->builder->setOption($type, $this->config['available_types'][$type]);

		$option = $this->builder->make($option);

		$this->chart['options'] = array_merge($this->chart['options'], $option);
	}

	public function setSerie($callback)
	{
		$this->builder->setSerie();

		$this->chart['series'][] = $this->builder->make($callback);
	}

	public function render()
	{
		$options = array_merge($this->chart['options'], ['series' => $this->chart['series']]);

		return json_encode($options);
	}
}