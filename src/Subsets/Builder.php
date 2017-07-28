<?php

namespace EnergieProduction\Chart\Subsets;

use EnergieProduction\Chart\Rendered;
use EnergieProduction\Chart\Criterias\Criteria;

abstract class Builder implements Subset {

	protected $criteriaList;
	public $cascade = null;

	public function __construct()
	{
		$this->criteriaList = collect();
	}

	public function pushCriteria(Criteria $criteria)
	{
		$this->criteriaList->push($criteria);
	}

	public function render()
	{
		$formatedSubset = [];

		foreach ($this->criteriaList as $criteria) {
			$formatedSubset = array_merge($formatedSubset, $criteria->render());
		}

		$render = new Rendered\Subset(new Rendered\Render($this));

		return $render->handle($formatedSubset);
	}

	public function setCascade($cascade)
	{
		$this->cascade = $cascade;
	}
}


