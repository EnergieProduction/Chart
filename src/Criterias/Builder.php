<?php

namespace EnergieProduction\Chart\Criterias;

use EnergieProduction\Chart\Traits;
use EnergieProduction\Chart\Rendered;
use EnergieProduction\Chart\Expression;

abstract class Builder implements Criteria {

	use Traits\BuilderService;

	protected $content;

	/**
	 * [__construct description]
	 * @param mixed $content	 
	 */
	public function __construct($content)
	{
		$this->content = $content;
	}

	/**
	 * [render description]
	 * @return array	 
	 */
	public function render()
	{
		$render = new Rendered\Render();
		$render = new Rendered\Criteria($render);

	    if ($this->content instanceof Expression) {
			$render = new Rendered\Expression($render);
	    }

		return $render->handle($this->resolveKey(), $this->content);
	}
}
