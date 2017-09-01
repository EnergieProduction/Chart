<?php

namespace EnergieProduction\Chart;

use closure;
use EnergieProduction\Chart\Exceptions\DotNotationNotAvailableException;

class Chart {

    protected $options = [];

    /**
     * [pushSubset description]
     * @param  string  $subset
     * @param  closure $closure
     * @throws EnergieProduction\Chart\Exceptions\DotNotationNotAvailableException
     * @return void
     */
    public function pushSubset($subset, closure $closure)
    {
        $option = new Option();

        $option->pushSubset($subset, $closure);

        $render = $option->render();

        if (starts_with($subset, 'series')) {

            if (str_contains($subset, '.')) {
                throw new Exceptions\DotNotationNotAvailableException();
            }

            $this->options['series'][] = $render['series'];
        }
        else {
            $this->options = array_merge_recursive($this->options, $render);
        }
    }

    /**
     * [render description]
     * @return void
     */
    public function render()
    {
        $formatedOption = json_encode($this->options);

        if (str_contains($formatedOption, '"#!!')) {
            $formatedOption = $this->restoreExpressions($formatedOption);
        }

        return $formatedOption;
    }

    /**
     * [restoreExpressions description]
     * @param  string $formatedOption
     * @return string
     */
    protected function restoreExpressions($formatedOption)
    {
        $formatedOption = str_replace('"#!!', '', $formatedOption);
        $formatedOption = str_replace('!!#"', '', $formatedOption);

        return $formatedOption;
    }  
}
