<?php

namespace EnergieProduction\Chart\Subsets;

use EnergieProduction\Chart\Traits;
use EnergieProduction\Chart\Rendered;
use EnergieProduction\Chart\Criterias\Criteria;

abstract class Builder implements Subset {

	use Traits\BuilderService;

	protected $criteriaList;
	public $cascade = null;

    /**
     * [__construct description]
     */
	public function __construct()
	{
		$this->criteriaList = collect();
	}

	/**
	 * [pushCriteria description]
	 * @param \EnergieProduction\Chart\Criterias\Criteria  $criteria
	 * @return void	 
	 */
	public function pushCriteria(Criteria $criteria)
	{
		$this->criteriaList->push($criteria);
	}

	/**
	 * [render description]
	 * @return array	 
	 */
	public function render()
	{
		$formatedSubset = [];

		foreach ($this->criteriaList as $criteria) {
			$formatedSubset = array_merge($formatedSubset, $criteria->render());
		}

		$render = new Rendered\Render();
		$render = new Rendered\Subset($render);

		$render->setCascade($this->cascade);

		return $render->handle($this->resolveKey(), $formatedSubset);
	}

    /**
     * [setCascade description]
     * @param string $cascade     
     */
	public function setCascade($cascade)
	{
		$this->cascade = $cascade;
	}
}
