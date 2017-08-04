<?php

namespace EnergieProduction\Chart\Rendered;

class Render implements rendered {

	protected $render;

	/**
	 * [__construct description]
	 * @param mixed $class	 
	 * @return void	 
	 */
    public function __construct($class)
    {
        $this->class = $class;
    }

	/**
	 * [__construct description]
	 * @param string $content	 
	 * @return array	 
	 */
    public function handle($content)
    {
        return [lcfirst(class_basename(get_class($this->class))) => $content];
    }
}
