<?php

namespace EnergieProduction\Chart\Highcharts\Series;

use EnergieProduction\Chart\Highcharts\Highchart;

Class Serie extends Highchart
{
	const path = __NAMESPACE__ . "\\Types\\";

	public function make($type, $callback)
	{
		return ['type' => $type] + parent::make($type, $callback);
	}
}
