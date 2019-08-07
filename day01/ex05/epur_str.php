<?php
if ($argc > 1)
{
	$str = $argv[1];
	while (    (strstr($str, "  ")) != false)
		$str = str_replace("  ", " ", $str);
	$array = explode(" ", $str);
	$string = NULL;
	foreach ($array as $val)
	{
		if ($string != NULL)
			$string = $string." ".$val;
		else
			$string = $val;
	}
	echo $string;
}
else
{
	echo "not enough argument buddy\n";
	return;
}
?>
