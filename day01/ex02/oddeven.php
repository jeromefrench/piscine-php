<?php
while (1)
{
	echo "Entrez un nombre: ";
	$input = fgets(STDIN);
	$input = rtrim($input);
	if (is_numeric($input))
	{
		if ($input % 2 == 0)
			echo "Le chiffre ".$input." est pair\n";
		else
			echo "Le chiffre ".$input." est impair\n";
	}
	else
		echo $input." n'est pas un chiffre\n";
}
?>
