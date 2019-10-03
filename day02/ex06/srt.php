#!/usr/bin/php
<?php

function my_sort($a, $b)
{
	preg_match("/[0-9]{2}:[0-9]{2}:[0-9]{2}/", $a['time'], $time_a);
	preg_match("/[0-9]{2}:[0-9]{2}:[0-9]{2}/", $b['time'], $time_b);
	$time_a = str_replace(":", "", $time_a);
	$time_b = str_replace(":", "", $time_b);
	if ($time_a > $time_b)
		return (true);
	else
		return (false);

	echo $time_a[0].PHP_EOL;
	echo $time_b[0].PHP_EOL;
}


if ($argc != 2 )
	exit();
$fd = fopen($argv[1], 'r');
$str = " ";
$global = array();
while (!feof($fd))
{
	$local = array();
	$i = 0;
	$end = false;
	while(!$end)
	{
		$str = fgets($fd);
		if ($i == 0)
		{
			$local['id'] = $str;
			$i++;
		}
		else if ($i == 1)
		{
			$local['time'] = $str;
			$i++;
		}
		else if ($i == 2)
		{
			$local['text'] = $str;
			$i++;
		}
		else if ($i == 3)
		{
			$end = true;
		}
	}
	$global[] = $local;
}

//le trie
usort($global, "my_sort");
$new_fd = fopen("./new", 'w');
foreach ($global as $glo)
{
	fwrite($new_fd, $glo['id']);
	fwrite($new_fd, $glo['time']);
	fwrite($new_fd, $glo['text']);
	fwrite($new_fd, "\n");
}
fclose($new_fd);
fclose($fd);
?>
