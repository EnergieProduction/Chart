<?php

namespace EnergieProduction\Chart\Criterias;

use EnergieProduction\Chart\Expression;

abstract class Builder implements Criteria {

	protected $content;

	public function __construct($content)
	{
		$this->content = $content;
	}

	public function render()
	{
	    if ($this->content instanceof Expression) {
			return [$this->getKey() => "#!!" . $this->content->render() . "!!#"];
	    }

		return [$this->getKey() => $this->content];
	}

	protected function getKey()
	{
		return lcfirst(class_basename(get_class($this)));
	}
}
