<?php

namespace EnergieProduction\Chart\Criterias;

use EnergieProduction\Chart\Contracts\Criteria;

abstract class Builder implements Criteria {

    protected $content;

    /**
     * [__construct description]
     * @param mixed $content
     */
    public function __construct($content)
    {
        $this->content = $content;
    }

    /**
     * [resolveKey description]
     * @return string
     */
    public function resolveKey()
    {
        if (isset($this->key)) {
            return $this->key;
        }

        return lcfirst(class_basename(get_class($this)));
    }

    /**
     * [getContent description]
     * @return mixed
     */
    public function getContent()
    {
        return $this->content;
    }
}
