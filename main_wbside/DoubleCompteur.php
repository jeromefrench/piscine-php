








<?php

require_once './Compteur.php'

class DoubleCompteur extends Compteur{


	public function recuperer(): int
	{

		return 2 * parent::recuperer();

	}
}


}


?>
