#!/usr/bin/php
<?php
if ($argc == 1)
	return;
$str = $argv[1];
while (strstr($str, "\t") != false)
	$str = str_replace("\t", " ", $str);
while (strstr($str, "  ") != false)
	$str = str_replace("  ", " ", $str);
$str = trim($str);
echo $str."\n";
?>
