<?php

include_once('./Vertex.class.php');

class Triangle
{
	public static $verbose = false;
	public /*Vertex*/ $_A;   //ac hanger le public
	public /*Vertex*/ $_B;   //ac hanger le public
	public  /*Vertex*/ $_C;

	public function __construct($A, $B, $C)
	{
		$this->_A = $A;
		$this->_B = $B;
		$this->_C = $C;


		if ($verbose || 1)
		{
			echo PHP_EOL."On construit un triangle".PHP_EOL;
			echo "Le premier vertex : x => ".$this->_A->getX()." y => ".$this->_A->getY()." z => ".$this->_A->getZ().PHP_EOL;
			echo "Le premier vertex : x => ".$this->_B->getX()." y => ".$this->_B->getY()." z => ".$this->_B->getZ().PHP_EOL;
			echo "Le premier vertex : x => ".$this->_C->getX()." y => ".$this->_C->getY()." z => ".$this->_C->getZ().PHP_EOL;


		}
	}
	public function __destruc()
	{
		if ($verbose)
			echo "je deconstruc";
	}
	public function __toString()
	{
		return "je suis to string\n".
		PHP_EOL." un triangle".PHP_EOL.
		"Le premier vertex : x => ".$this->_A->getX()." y => ".$this->_A->getY()." z => ".$this->_A->getZ().PHP_EOL.
		"Le premier vertex : x => ".$this->_B->getX()." y => ".$this->_B->getY()." z => ".$this->_B->getZ().PHP_EOL.
		"Le premier vertex : x => ".$this->_C->getX()." y => ".$this->_C->getY()." z => ".$this->_C->getZ().PHP_EOL;

	}
	public static function doc()
	{
		echo "je suis la doc";

	}

}

?>
