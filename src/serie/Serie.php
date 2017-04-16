<?php

Namespace EnergieProduction\Chart\Serie;

Class Serie {

	public function render()
	{
		return $this->options;
	}

	public function name($value = null)
	{
		$this->options[__FUNCTION__] = $value;
	}

	public function data(array $value = [])
	{
		$this->options[__FUNCTION__] = $value;
	}

	public function zIndex($value = null)
	{
		$this->options[__FUNCTION__] = $value;
	}

	public function color($value = null)
	{
		$this->options[__FUNCTION__] = $value;
	}

	public function type($value = null)
	{
		$this->options[__FUNCTION__] = $value;
	}

	public function fillOpacity($value = null)
	{
		$this->options[__FUNCTION__] = $value;
	}

	public function lineWidth($value = null)
	{
		$this->options[__FUNCTION__] = $value;
	}
}