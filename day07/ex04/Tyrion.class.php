<?php
class Tyrion {

	public function sleepWith($class){
		if(get_class($class) == "Jaime")
			print( "Not even if I'm drunk !". PHP_EOL);
		if(get_class($class) == "Sansa")
			print( "Let's do this.". PHP_EOL);
		if(get_class($class) == "Cersei")
			print( "Not even if I'm drunk !". PHP_EOL);
	}

}
?>
