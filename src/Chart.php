<?php

namespace EnergieProduction\Chart;

use Closure;
use Illuminate\Support\Collection;
use EnergieProduction\Chart\Subsets;

Class Chart {

	protected $subsetList;

	/**
	 * [__construct description]
	 * @param \Illuminate\Support\Collection $subsetList
	 */
	public function __construct(Collection $subsetList)
	{
		$this->subsetList = $subsetList;
	}

	/**
	 * [addSubset description]
	 * @param string  $subset
	 * @param \Closure $closure
	 */
	public function addSubset($subset, Closure $closure)
	{
		if (str_contains($subset, '.')) {
			$this->addCascadeSubset($subset, $closure);
		}
		else {
			$this->addSimpleSubset($subset, $closure);
		}
	}

	/**
	 * [render description]
	 * @return json [description]
	 */
	public function render()
	{
		$formatedChart = [];

		foreach ($this->subsetList as $subset) {

			$render = $subset->render();

			if ($subset->cascade) {

				$tmpArray = [];

				$this->dotNotationToArray($tmpArray, $subset->cascade, $render);

				$render = $tmpArray;
			}

			$formatedChart = array_merge_recursive($formatedChart, $render);
		}

		$formatedChart = json_encode($formatedChart);

		if (str_contains($formatedChart, '"#!!')) {
			$formatedChart = $this->restoreExpressions($formatedChart);
		}

		return $formatedChart;
	}

	/**
	 * [addSimpleSubset description]
	 * @param string  $subset
	 * @param \Closure $closure
	 */
	protected function addSimpleSubset($subset, Closure $closure)
	{
		$subset = $this->makeSubsetClass($subset);

		$this->callFunc($closure, $subset);

		$this->subsetList->push($subset);
	}

	/**
	 * [addCascadeSubset description]
	 * @param string  $cascadeSubsetNotation
	 * @param \Closure $closure
	 */
	protected function addCascadeSubset($cascadeSubsetNotation, Closure $closure)
	{
		$subsetsList = explode('.', $cascadeSubsetNotation);

		$subset = $this->makeSubsetClass(end($subsetsList));

		$subset->setCascade($cascadeSubsetNotation);

		$this->callFunc($closure, $subset);

		$this->subsetList->push($subset);
	}

	/**
	 * [callFunc description]
	 * @param  \Closure $closure
	 * @param  \EnergieProduction\Subsets\* $class
	 */
	protected function callFunc(Closure $closure, $class)
	{
		return call_user_func($closure, $class);
	}

	/**
	 * [makeSubsetClass description]
	 * @param  string $subset
	 * @return \EnergieProduction\Subsets\*
	 */
	protected function makeSubsetClass($subset)
	{
		$class = "EnergieProduction\\Chart\\Subsets\\" . ucfirst($subset);

		return new $class;
	}

	/**
	 * [dotNotationToArray description]
	 * @param  array  &$arr
	 * @param  string $path
	 * @param  array $val
	 * @return array
	 */
	protected function dotNotationToArray(array &$arr, $path, $val)
	{
	   $loc = &$arr;

	   $path = explode('.', $path);

	   array_pop($path);

	   foreach($path as $step)
	   {
	     $loc = &$loc[$step];
	   }

	   return $loc = $val;
	}

	/**
	 * [restoreExpressions description]
	 * @param  string $formatedChart
	 * @return string
	 */
	protected function restoreExpressions($formatedChart)
	{
		$formatedChart = str_replace('"#!!', '', $formatedChart);
		$formatedChart = str_replace('!!#"', '', $formatedChart);

		return $formatedChart;
	}
}
