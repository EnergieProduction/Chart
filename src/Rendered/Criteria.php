<?php

namespace EnergieProduction\Chart\Rendered;

class Criteria implements Rendered {

	protected $render;

    public function __construct(Rendered $render)
    {
        $this->render = $render;
    }

    public function handle($content)
    {
        return $this->render->handle($content);
    }
}
