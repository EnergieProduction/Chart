<?php

namespace EnergieProduction\Chart\Rendered;

class Render implements rendered {

    /**
    * [handle description]
    * @param string $key  
    * @param string $content  
    * @return array  
    */
    public function handle($key, $content)
    {
        return [$key => $content];
    }
}
