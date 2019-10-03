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
{
	echo "helloA";
	exit(0);

}
echo $index;


foreach ($array as $line)
{
	$i = 0;
	foreach ($line as $string)
	{
	$param = array();
	$$param = $header[$i];
		var_dump($header[$i]);
		var_dump($string);
		$param[$header[$i]] = $string;
		$i++;
	}
	$$param = $header[$index];
	echo "bli :\n";
	var_dump($$param);
	echo "bli\n\n";
	exit(0);
}




while (!feof(STDIN))
{
	echo "Entrez votre commande".PHP_EOL;
	$command = fgets(STDIN);
	if (1)
	{
		echo "helllo\n";
		echo $command;
		echo  eval($command);
		echo "\n\n";
	}
}

?>
