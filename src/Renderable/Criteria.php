<?php

namespace EnergieProduction\Chart\Renderable;

class Criteria {

    public function __construct($render)
    {
        $this->render = $render;
    }

    public function handle($key, $content)
    {
        return $this->render->handle($key, $content);
    }           
}
