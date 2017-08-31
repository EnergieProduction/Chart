<?php

namespace EnergieProduction\Chart\Renderable;

class Render {
        
    public function handle($key, $content)
    {
        return [$key => $content];
    }
}
