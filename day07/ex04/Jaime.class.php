<?php
class Jaime {

	public function sleepWith($class){
		if(get_class($class) == "Tyrion")
			print( "Not even if I'm drunk !". PHP_EOL);
		if(get_class($class) == "Sansa")
			print( "Let's do this". PHP_EOL);
		if(get_class($class) == "Cersei")
			print( "With pleasure but only in a tower in Winterfell, then.". PHP_EOL);
	}

}
?>
