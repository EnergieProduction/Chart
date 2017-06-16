<?php

Namespace EnergieProduction\Chart\Highcharts;

use EnergieProduction\Chart\Exceptions\UnavailablePropertyException;

abstract class Type
{
	protected $availableProperties = [];
	protected $options = [];
	protected $pattern = [];

	public function __construct(array $availableProperties)
	{
		$this->availableProperties = $availableProperties;
	}

	public function render()
	{
		return array_merge($this->pattern, $this->options);
	}

	public function pattern($value)
	{
		$value = (is_array($value)) ? $value : [$value] ;

		$this->pattern = $value;
	}

    public function __set($key, $value)
    {
        if (! in_array($key, $this->availableProperties)) {
            throw new UnavailablePropertyException($key . ' is not a valid property');
        }

        return $this->setAttribute($key, $value);
    }

    protected function setAttribute($key, $value)
    {
        $method = $this->formatMethod($key, 'set');

        if ($method) {
            return $this->{$method}($value);
        }

        return $this->options[$key] = $value;
    }

    protected function formatMethod($key, $type)
    {
        $method = $type . studly_case($key) . 'Property';

        if (method_exists($this, $method)) {
            return $method;
        }

        return null;
    }
}
