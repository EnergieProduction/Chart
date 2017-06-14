<?php

namespace EnergieProduction\Chart;

use Closure;
use Exception;
use EnergieProduction\Chart\Highcharts\Options\Option;
use EnergieProduction\Chart\Highcharts\Series\Serie;
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
		$options = new Option($this->config['options']);

		$formattedOption = $options->make($type, $callback);

		$this->chart['options'] = array_merge($this->chart['options'], $formattedOption);
	}

	public function setSerie($type, $callback)
	{
		$series = new Serie($this->config['series']);

		$formattedSerie = $series->make($type, $callback);

		$this->chart['series'][] = $formattedSerie;
	}

	public function render()
	{
		$options = array_merge($this->chart['options'], ['series' => $this->chart['series']]);

		return json_encode($options);
	}
}
