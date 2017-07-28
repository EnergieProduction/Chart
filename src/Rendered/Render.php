<?php

namespace EnergieProduction\Chart\Rendered;

class Render implements rendered {

    public function __construct($class)
    {
        $this->class = $class;
    }

    public function handle($content)
    {
        return [lcfirst(class_basename(get_class($this->class))) => $content];
    }
}
