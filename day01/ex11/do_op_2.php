#!/usr/bin/php
<?php

if ($argc < 2)
{
	echo "Incorrect Parameters".PHP_EOL;
	exit(0);
}



if (strstr($argv[1], "+"))
{
	$array = explode("+", $argv[1]);
	$array[0] = trim($array[0]);
	$array[1] = trim($array[1]);
	if (is_numeric($array[0]) && is_numeric($array[1]) )
		$result = $array[0] + $array[1];
	else
		$result = "Syntax Error";
}
else if (strstr($argv[1], "-"))
{
	$array = explode("-", $argv[1]);
	$array[0] = trim($array[0]);
	$array[1] = trim($array[1]);
	if (is_numeric($array[0]) && is_numeric($array[1]) )
		$result = $array[0] - $array[1];
	else
		$result = "Syntax Error";
}
else if (strstr($argv[1], "*"))
{
	$array = explode("*", $argv[1]);
	$array[0] = trim($array[0]);
	$array[1] = trim($array[1]);
	if (is_numeric($array[0]) && is_numeric($array[1]) )
		$result = $array[0] * $array[1];
	else
		$result = "Syntax Error";
}
else if (strstr($argv[1], "/"))
{
	$array = explode("/", $argv[1]);
	$array[0] = trim($array[0]);
	$array[1] = trim($array[1]);
	if (is_numeric($array[0]) && is_numeric($array[1]) )
		$result = $array[0] / $array[1];
	else
		$result = "Syntax Error";
}
else if (strstr($argv[1], "%"))
{
	$array = explode("%", $argv[1]);
	$array[0] = trim($array[0]);
	$array[1] = trim($array[1]);
	if (is_numeric($array[0]) && is_numeric($array[1]) )
		$result = $array[0] % $array[1];
	else
		$result = "Syntax Error";
}
echo $result;
?>

