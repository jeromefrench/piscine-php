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
		$i = 0;
		while ($i < self::$count)
		{
			if (class_implements(j
			$this->fighter[$i]->fight();
			$i++;
		}
	}
}
?>
