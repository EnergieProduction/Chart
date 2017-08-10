<?php

namespace EnergieProduction\Chart\Contracts;

use EnergieProduction\Chart\Contracts;

interface Subset {

	public function pushCriteria(Contracts\Criteria $criteria);
	public function render();
	public function setCascade($cascade);
	public function resolveKey();

}
