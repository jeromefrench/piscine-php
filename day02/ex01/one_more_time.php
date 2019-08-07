#!/usr/bin/php
<?php
echo "hello\n";

$hour = 3;
$minute = 30;
$second = 10;
$month = 3;
$day = 3;
$year = 2019;


$time = mktime($hour, $minute, $second, $month, $day, $year);
echo $time;
?>
