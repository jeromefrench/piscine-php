#!/usr/bin/php
<?php
if (strstr($argv[1], "+"))
{
	$array = explode("+", $argv[1]);
	$result = $array[0] + $array[1];
}
if (strstr($argv[1], "-"))
{
	$array = explode("-", $argv[1]);
	$result = $array[0] - $array[1];
}
if (strstr($argv[1], "*"))
{
	$array = explode("*", $argv[1]);
	$result = $array[0] * $array[1];
}
if (strstr($argv[1], "/"))
{
	$array = explode("/", $argv[1]);
	$result = $array[0] / $array[1];
}
if (strstr($argv[1], "%"))
{
	$array = explode("%", $argv[1]);
	$result = $array[0] % $array[1];
}
echo $result;
?>

