<?php

namespace EnergieProduction\Chart\Rendered;

class Subset implements Rendered {

    public function __construct(Rendered $render)
    {
        $this->render = $render;
    }

    public function handle($content)
    {
        $subset = lcfirst(class_basename(get_class($this->render->class)));

        if ($subset === 'series' && (! $this->render->class->cascade || starts_with($this->render->class->cascade, 'series.'))) {
            $content = [$content];
        }

        return $this->render->handle($content);
    }
}