<?php

namespace EnergieProduction\Chart\Rendered;

class Subset implements Rendered {

    protected $render;
    protected $cascade = null;

    /**
     * [__construct description]
     * @param \EnergieProduction\Chart\Rendered\Rendered $render
     */
    public function __construct(Rendered $render)
    {
        $this->render = $render;
    }

    /**
     * [setCascade description]
     * @param string
     * @return void
     */
    public function setCascade($cascade = null)
    {
        $this->cascade = $cascade;
    }

    /**
    * [handle description]
    * @param string $key  
    * @param string $content  
    * @return array  
    */
    public function handle($key, $content)
    {
        if ($key == 'series' && (! $this->cascade || starts_with($this->cascade, 'series.'))) {
            $content = [$content];
        }

        return $this->render->handle($key, $content);
    }
}