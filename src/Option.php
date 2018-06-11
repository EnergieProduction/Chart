<?php

namespace EnergieProduction\Chart;

use closure;
use EnergieProduction\Chart\Renderable;
use EnergieProduction\Chart\Contracts\Expression;

class Option
{

    protected $options;

    public function __construct()
    {
        $this->options = [];
    }

    /**
     * [pushSubset description]
     * @param  string  $subset
     * @param  \closure $closure
     * @return void
     */
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

    /**
     * [pushCriteria description]
     * @param  mixed $criteria
     * @return void
     */
    public function pushCriteria($criteria)
    {
        $content = $criteria->getcontent();

        $render = new Renderable\Render();
        $render = new Renderable\Criteria($render);

        if ($content instanceof Expression) {
            $render = new Renderable\Expression($render);
            $content = $content->render();
        }

        $this->options = array_merge($this->options, $render->handle(
            $criteria->resolveKey(),
            $content
        ));
    }

    /**
     * [render description]
     * @return array
     */
    public function render()
    {
        return $this->options;
    }
}
