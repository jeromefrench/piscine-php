#!/usr/bin/php
<?php

if ($argc != 3)
	exit(0);

$fd = fopen($argv[1], 'r');

if ($fd == false)
	exit(0);

$array = array();
while (!feof($fd))
{
	$buf = fgetcsv($fd, 0, ';');
	if ($buf)
	$array[] = $buf;
}

$header = $array[0];

var_dump($header);


unset($array[0]);
$index = array_search($argv[2], $header);
if ($index == false)
	exit(0);

echo $index;







while (!feof(STDIN))
{
	echo "Entrez votre commande".PHP_EOL;
	$command = fgets(STDIN);
	if ($commande != false)
	{
		eval($commande);
	}
}



?>
