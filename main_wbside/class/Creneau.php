<?php

class Creneau {
	public $debut;
	public $fin;


	public function __construct(int $debut, int $fin){
		$this->debut = $debut;
		$this->fin = $fin;
	}


	public function inclusHeure(int $heure)
	{
		if ($heure >= $this->debut && $heure <= $this->fin)
			return true;
		else
			return false;
	}

	public function intersect (Creneau $creneau): bool
	{
		if ($this->inclusHeure($creneau->debut) ||
			$this->inclusHeure($creneau->fin))
			return true;
		else
			return false;
	}

	public function toHTML():string
	{
		return '<strong>'.$this->debut.'</strong> a <strong>'.$this->fin;
	}


}


?>
