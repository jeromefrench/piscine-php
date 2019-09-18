#!/usr/bin/php
<?php

if ($argc != 4)
	exit(0);


$op1 = trim($argv[1]);
$op2 = trim($argv[3]);
$op = trim($argv[2]);


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
echo $result;

?>

