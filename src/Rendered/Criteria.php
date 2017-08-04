<?php

namespace EnergieProduction\Chart\Rendered;

class Criteria implements Rendered {

	protected $render;

	/**
	 * [__construct description]
	 * @param \EnergieProduction\Chart\Rendered\Rendered $render	 
	 */
    public function __construct(Rendered $render)
    {
        $this->render = $render;
    }

	/**
	 * [handle description]
	 * @param string $content	 
	 * @return array	 
	 */
    public function handle($content)
    {
        return $this->render->handle($content);
    }
}
