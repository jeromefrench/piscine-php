#!/usr/bin/php
<?php
	if (isset($argv[1]))
	{
		$str = trim($argv[1]);
		while ((strstr($str, "  ")) != false)
			$str = str_replace("  ", " ", trim($str));
		$array = explode(" ", $str);
		$tmp = $array[0];
		$array[0] = $array[count($array) - 1];
		$array[count($array) - 1] = $tmp;
		$i = 0;
		foreach ($array as $val)
		{
			if ($i == 0)
			{
			echo $val;
			$i++;
			}
			else
			{
				echo " ".$val;
			}
		}
		echo PHP_EOL;
	}
?>
