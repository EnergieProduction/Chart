<?php

namespace EnergieProduction\Chart\Subsets;

use EnergieProduction\Chart\Criterias\Criteria;

Interface Subset {

	public function pushCriteria(Criteria $criteria);
	public function render();
	public function setCascade($cascade);

}
