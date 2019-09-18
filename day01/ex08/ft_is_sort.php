#!/usr/bin/php
<?php

function ft_is_sort($array)
{
	$i = 0;
	$tmp = "";
	foreach ($array as $val)
	{
		if ($i == 0)
		{
			$i++;
			$tmp = $val;
		}
		else
		{
			echo "le tmp  :".$tmp.PHP_EOL;
			echo "le val  :".$val.PHP_EOL;
			if (strcmp($tmp, $val) < 0)
			{
				$tmp = $val;
			}
			else
			{
				return (0);
			}
		}
	}
	return (1);
}


/* $tab = array("!/@#;^", "42", "Hello World", "salut", "zZzZzZz"); */
$tab = array("a", "d", "c");
if (ft_is_sort($tab))
echo "Le tableau est trie\n";
else
echo "Le tableau n’est pas trie\n";

?>
