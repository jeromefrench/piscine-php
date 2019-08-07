<?php
function ft_split($str)
{
	while (    (strstr($str, "  ")) != false)
		$str = str_replace("  ", " ", $str);
	$array = explode(" ", $str);
	$i = 0;
	while ($i < count($array) - 1)
	{
		echo "hello\n";
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
	return($array);
}
var_dump(ft_split("ddd aaa ccc"));
?>
