#!/usr/bin/php
<?php
exec("who", $array);
foreach($array as $val)
	echo $val."\n";
?>
