<?php

namespace EnergieProduction\Chart\Criterias;

use EnergieProduction\Chart\Contracts\Criteria;

abstract class Builder implements Criteria {

    protected $content;

    public function __construct($content)
    {
        $this->content = $content;
    }

    public function getKey()
    {
        if (isset($this->key)) {
            return $this->key;
        }

        return lcfirst(class_basename(get_class($this)));
    }

    public function getContent()
    {
        return $this->content;
    }

    public function render()
    {   
        $render = new Renderable\Render();
        $render = new Renderable\Criteria($render);

        return $render->handle($this->getKey(), $content);
    }
}
