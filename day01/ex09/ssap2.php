#!/usr/bin/php
<?php
function custom_sort($a, $b) : int
{
	$ca = strtolower($a);
	$cb = strtolower($b);
	$i = 0;
	$comp = "abcdefghijklmnopqrstuvwxyz0123456789!\"#$%&'()*+,-./:;<=>?@[\]^_`{|}~";
	$result = true;
	while ($i < strlen($ca) || $i < strlen($cb))
	{
		$posa = strpos($comp, $ca[$i]);
		$posb = strpos($comp, $cb[$i]);
		if ($posa < $posb)
			return (-1);
		else if ($posa > $posb)
			return (1);
		else
			$i++;
	}
}
$str = "";
$i = 0;
foreach ($argv as $arg)
{
	if ($i == 0)
		$i++;
	else
		$str .= ' '.($arg);
}
while (strpos($str, "  ")!= false)
	$str = str_replace("  ", " ", $str);
$str = trim($str);
$array = explode(" ",$str);
usort($array, "custom_sort");
foreach ($array as $val)
{
	echo $val.PHP_EOL;
}
?>
