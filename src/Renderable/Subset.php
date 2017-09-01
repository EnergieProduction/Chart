<?php

namespace EnergieProduction\Chart\Renderable;

use EnergieProduction\Chart\Contracts\Renderable;

class Subset implements Renderable {

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
        if (str_contains($key, '.')) {

            $path = explode('.', $key);

            $result = [];

            $this->dotNotationToArray($result, $path, $content);

            return $this->render->handle($path[0], $result);
        }

        return $this->render->handle($key, $content);
    }         

    /**
     * [dotNotationToArray description]
     * @param  array  &$arr
     * @param  string $path
     * @param  string $val
     * @return array
     */
    protected function dotNotationToArray(array &$arr, $path, $val)
    {
       $loc = &$arr;

       array_shift($path);

        foreach($path as $step)
        {
            $loc = &$loc[$step];
        }
       
       return $loc = $val;
    }       
}
