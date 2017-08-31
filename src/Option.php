<?php

namespace EnergieProduction\Chart;

use closure;
use EnergieProduction\Chart\Renderable;
use EnergieProduction\Chart\Contracts\Criteria;

class Option {

    protected $options;

    public function __construct()
    {
        $this->options = [];
    }

    public function pushCriteria(Criteria $criteria)
    {
        $render = new Renderable\Render();
        $render = new Renderable\Criteria($render);

        $this->options = array_merge($this->options, $render->handle(
            $criteria->getKey(), 
            $criteria->getcontent()
        ));
    }

    public function pushSubset($subset, closure $closure)
    {
        $option = new self;

        call_user_func($closure, $option);

        $render = new Renderable\Render();
        $render = new Renderable\Subset($render);

        $this->options = array_merge($this->options, $render->handle(
            $subset, 
            $option->render()
        ));
    }

    public function render()
    {
        return $this->options;
    }
}
