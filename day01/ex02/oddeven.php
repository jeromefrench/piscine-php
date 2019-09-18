#!/usr/bin/php
<?php
while (1)
{
	echo "Entrez un nombre: ";
	$input = fgets(STDIN);
	$input = trim($input);
	if (feof(STDIN) == TRUE)
		exit(0);
	if (is_numeric($input))
	{
		if ($input % 2 == 0)
			echo "Le chiffre ".$input." est pair".PHP_EOL;
		else
			echo "Le chiffre ".$input." est impair".PHP_EOL;
	}
	else
		echo $input." n'est pas un chiffre".PHP_EOL;
}
?>
