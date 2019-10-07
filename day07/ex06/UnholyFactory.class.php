<?php

class UnholyFactory 
{
	public $fighter_array;

	public function __construct()
	{
		$this->fighter_array = array();
	}

	public function absorb($instance)
	{
		if (!is_subclass_of($instance, Fighter))
		{
			echo "(Factory can't absorb this, it's not a fighter".PHP_EOL;
			return;
		}
		if (!in_array($instance->name, $this->fighter_array))
		{
			echo "(Factory absorbed a fighter of type ".$instance->name.")".PHP_EOL;
			$this->fighter_array[] = $instance->name;
		}
		else
		{
			echo "(Factory already absorbed a fighter of type ".$instance->name.")".PHP_EOL;
		}
	}
	public function fabricate($fighter)
	{
		$class_name = $fighter;
		$fighter = ucwords($fighter);
		while (false != strpos($fighter, " "))
			$fighter = str_replace(' ', '', $fighter);
		$instance = new $fighter();
		if (is_subclass_of($instance, Fighter))
		{
			echo "(Factory fabricate a fighter of type ".$class_name.")".PHP_EOL;
			return $instance;
		}
		else
		{
			echo "(Factory hasn't absorbed any fighter of type ".$class_name.")".PHP_EOL;
			return null;
		}
	}
}
?>
