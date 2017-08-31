<?php

namespace EnergieProduction\Chart\Renderable;

class Subset {

    public function __construct($render)
    {
        $this->render = $render;
    }

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
