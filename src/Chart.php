<?php

namespace EnergieProduction\Chart;

use Closure;
use Exception;
use EnergieProduction\Chart\Exceptions\UnavailableSerieException;
use EnergieProduction\Chart\Exceptions\UnavailableOptionException;

Class Chart
{
	protected $chart = [];
	protected $config = [];

	public function __construct(array $config)
	{
		$this->config = $config;
		$this->chart = [
			'options' => [],
			'series' => [],
		];
	}

	public function setOption($type, $callback)
	{
		$options = new Options($this->config['options']);

		$formattedOption = $options->make($type, $callback);

		$this->chart['options'] = array_merge($this->chart['options'], $formattedOption);
	}

	public function setSerie($type, $callback)
	{
		$series = new Series($this->config['series']);

		$formattedSerie = $series->make($type, $callback);

		$this->chart['series'][] = $formattedSerie;
	}

	public function render()
	{
		$options = array_merge($this->chart['options'], ['series' => $this->chart['series']]);

		return json_encode($options);
	}
}
