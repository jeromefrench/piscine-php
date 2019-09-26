#!/usr/bin/php
<?php
if ($argc > 1)
{
	$str = NULL;
	$i = 0;
	foreach ($argv as $val)
	{
		$val = trim($val);
		if ($i > 1)
			$str = $str." ".$val;
		else if ($i > 0)
		{
			$str = $val;
			$i = 2;
		}
		else
			$i = 1;
	}
	while (    (strstr($str, "  ")) != false)
		$str = str_replace("  ", " ", $str);
	$array = explode(" ", $str);
	$i = 0;
	while ($i < count($array) - 1)
	{
		if (strcmp($array[$i], $array[$i + 1]) < 0)
			$i++;
		else
		{
			$tmp = $array[$i];
			$array[$i] = $array[$i + 1];
			$array[$i + 1] = $tmp;
			$i = 0;
		}
	}
	foreach ($array as $val)
		echo $val.PHP_EOL;
}
else
{
}
?>
