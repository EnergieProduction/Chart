<?php

namespace EnergieProduction\Chart\Rendered;

class Expression implements Rendered {

	protected $render;

	/**
	 * [__construct description]
	 * @param \EnergieProduction\Chart\Rendered\Rendered $render	 
	 * @return void	 
	 */
    public function __construct(Rendered $render)
    {
        $this->render = $render;
    }

	/**
	 * [handle description]
	 * @param mixed $content	 
	 * @return array	 
	 */
    public function handle($content)
    {
        return $this->render->handle("#!!" . $content->render() . "!!#");
    }
}