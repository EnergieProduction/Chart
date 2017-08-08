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

    public function handle($key, $content)
    {
        return $this->render->handle($key, $content);
    }
}
