#!/usr/bin/php
<?php
$i = 0;
foreach ($argv as $arg)
{
	if ($i != 0)
		echo $arg.PHP_EOL;
	$i = 1;
}
?>
