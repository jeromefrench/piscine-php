#!/usr/bin/php
<?php

if ($argc < 3)
	exit(0);


$i = 0;
foreach ($argv as $val)
{
	/* var_dump($val); */
	if ($i == 0 || $i == 1)
	{
		$i++;
		$jack = $argv[1];
		/* var_dump($jack); */
	}
	else
	{
		$param = explode(":", $val);
		/* var_dump($param); */
		if ($param[0] == $jack)
		{
			echo $param[1].PHP_EOL;
			exit(0);
		}
	}
}

?>

