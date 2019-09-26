#!/usr/bin/php
<?php
if ($argc != 4)
{
	echo "Incorrect Parameters".PHP_EOL;
	exit(0);
}

$op1 = trim($argv[1]);
$op2 = trim($argv[3]);
$op = trim($argv[2]);


$result = "";
if ($op == "+")
	$result =  $op1 + $op2;
if ($op == "-")
	$result =  $op1 - $op2;
if ($op == "/")
	$result =  $op1 / $op2;
if ($op == "%")
	$result =  $op1 % $op2;
if ($op == "*")
	$result =  $op1 * $op2;
echo $result.PHP_EOL;

?>

