<?php

namespace EnergieProduction\Chart\Renderable;

use EnergieProduction\Chart\Contracts\Renderable;

class Render implements Renderable {

    /**
     * [handle description]
     * @param  string $key
     * @param  mixed $content
     * @return array
     */        
    public function handle($key, $content)
    {
        return [$key => $content];
    }
}
