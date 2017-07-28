<?php

namespace EnergieProduction\Chart\Criterias;

use EnergieProduction\Chart\Rendered;
use EnergieProduction\Chart\Expression;

abstract class Builder implements Criteria {

	protected $content;

	public function __construct($content)
	{
		$this->content = $content;
	}

	public function render()
	{
		$render = new Rendered\Render($this);
		$render = new Rendered\Criteria($render);

	    if ($this->content instanceof Expression) {
			$render = new Rendered\Expression($render);
	    }

		return $render->handle($this->content);
	}

	protected function getKey()
	{
		return lcfirst(class_basename(get_class($this)));
	}
}






