<?php

namespace Service\Subsets;

use Service\Criterias\Criteria;

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

		$subset = lcfirst(class_basename(get_class($this)));

		if ($subset === 'series' && (! $this->cascade || starts_with($this->cascade, 'series.'))) {
			return [$subset => [$formatedSubset]];
		}

		return [$subset => $formatedSubset];
	}

	public function setCascade($cascade)
	{
		$this->cascade = $cascade;
	}
}


