#!/usr/bin/php
<?php
	if (isset($argv[1]))
	{
		$str = trim($argv[1]);
		while ((strstr($str, "  ")) != false)
			$str = str_replace("  ", " ", trim($str));
		$array = explode(" ", $str);


		$array[count($array)] = $array[0];
		$i = 0;
		foreach ($array as $val)
		{
			if ($i == 1)
			{
			echo $val;
			$i++;
			}
			else if ($i > 1)
			{
				echo " ".$val;
			}
			else
			{
				$i++;
			}
		}
		echo PHP_EOL;
	}
?>
