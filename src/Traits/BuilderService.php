<?php

namespace EnergieProduction\Chart\Traits;

trait BuilderService {

	/**
	 * [resolveKey description]
	 * @return string
	 */
	public function resolveKey()
	{
		if (method_exists($this, 'getKey')) {
			return $this->getKey();
		}

		return lcfirst(class_basename(get_class($this)));
	}
}
