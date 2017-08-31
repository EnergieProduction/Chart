<?php

namespace EnergieProduction\Chart;

class List {

    protected $list;

    public function __construct()
    {
        $this->list = [];
    }

    public function set($key, $values)
    {
        $this->list[$key] = $values;
    }

    public function setDotNotation($dotNotations, $values)
    {
        $render = [];
        $this->dotNotationToArray($render, $dotNotations, $values);
        $this->list = array_merge_recursive($this->list, $render);
    }

    public function render()
    {
        return $this->list;
    }

    protected function dotNotationToArray(array &$arr, $path, $val)
    {
       $loc = &$arr;

       $path = explode('.', $path);

       foreach($path as $step)
       {
         $loc = &$loc[$step];
       }
       
       return $loc = $val;
    }        
}