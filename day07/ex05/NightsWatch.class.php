<?php
class NightsWatch {
	public $fighter;
	public static $count = 0;
	public function recruit($arg)
	{
		$this->fighter[self::$count] = $arg;
		self::$count++;
	}
	public function fight()
	{
		foreach ($this->fighter as $fighter)
		{
			$interface = array();
			$interface = class_implements($fighter);
			foreach( $interface as $value)
			{
				if ($value == "IFighter")
					$fighter->fight();
			}
		}
	}
}
?>
