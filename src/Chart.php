<?php

namespace EnergieProduction\Chart;

use closure;

class Chart {

    protected $options = [];

    public function pushSubset($subset, closure $closure)
    {
        $option = new Option();

        $option->pushSubset($subset, $closure);

        $this->options[] = $option->render();
    }

    public function render()
    {
        return json_encode($this->options);
    }              
}
