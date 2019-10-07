<?php

abstract class Fighter
{
	public $name;

	public function __construct($name_fighter)
	{
		$this->name = $name_fighter;
		return $name_fighter;
	}
	public abstract function fight($target);
}
?>
