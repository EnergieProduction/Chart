<?php

namespace EnergieProduction\Chart\Renderable;

use EnergieProduction\Chart\Contracts\Renderable;

class Expression implements Renderable
{

    protected $render;

    /**
     * [__construct description]
     * @param \EnergieProduction\Chart\Contracts\Renderable $render
     */
    public function __construct(Renderable $render)
    {
        $this->render = $render;
    }

    /**
     * [handle description]
     * @param  string $key
     * @param  mixed $content
     * @return array
     */
    public function handle($key, $content)
    {
        return $this->render->handle($key, "#!!" . $content . "!!#");
    }
}
