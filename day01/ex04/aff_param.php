<?php
$i = 0;
foreach ($argv as $arg)
{
	if ($i != 0)
		echo $arg."\n";
	$i = 1;
}
?>
