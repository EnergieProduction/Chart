<?php

namespace EnergieProduction\Chart\Rendered;

class Render implements rendered {

    public function handle($key, $content)
    {
        return [$key => $content];
    }
}
