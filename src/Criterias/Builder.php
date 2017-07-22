<?php

namespace EnergieProduction\Criterias;

abstract class Builder implements Criteria {

	protected $content;

	public function __construct($content)
	{
		$this->content = $content;
	}

	public function render()
	{
		return [lcfirst(class_basename(get_class($this))) => $this->content];
	}
}
