<?php

class Targaryen {

	public function __construct(){
	}
	public function getBurned(){
		if (static::resistsFire() == false)
			return "burns alive";
		else
			return "emerges nakes but unharmed";
	}
	public function resistsFire(){
		return false;
	}


}
?>
