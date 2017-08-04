<?php

namespace EnergieProduction\Chart\Criterias;

use EnergieProduction\Chart\Rendered;
use EnergieProduction\Chart\Expression;

abstract class Builder implements Criteria {

	protected $content;

	/**
	 * [__construct description]
	 * @param mixed $content	 
	 * @return void	 
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
		$render = new Rendered\Render($this);
		$render = new Rendered\Criteria($render);

	    if ($this->content instanceof Expression) {
			$render = new Rendered\Expression($render);
	    }

		return $render->handle($this->content);
	}
}
