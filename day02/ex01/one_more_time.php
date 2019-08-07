#!/usr/bin/php
<?php

function ft_get_month_number($str)
{
	$str = strtolower($str);
	if ($str == "janvier")
		return(1);
	elseif($str == "fevrier")
		return(2);
	elseif($str == "mars")
		return(3);
	elseif($str == "avril")
		return(4);
	elseif($str == "mai")
		return(5);
	elseif($str == "juin")
		return(6);
	elseif($str == "juillet")
		return(7);
	elseif($str == "aout")
		return(8);
	elseif($str == "septembre")
		return(9);
	elseif($str == "octobre")
		return(10);
	elseif($str == "novembre")
		return(11);
	elseif($str == "decembre")
		return(12);
}


echo "hello\n";

if ($argc == 1)
	return;
$str = $argv[1];
if (preg_match("/(lundi|Lundi|mardi|Mardi|mercredi|Mercredi|jeudi|Jeudi|vendredi|Vendredi|samedi|Samedi|dimanche|Dimanche)\s[0-9]{1,2}\s(janvier|Janvier|fevrier|Fevrier|mars|Mars|avril|Avril|mai|Mai|juin|Juin|juillet|Juiller|aout|Aout|septembre|Septembre|octobre|Octobre|novembre|Novembre|decembre|Decembre)\s[0-9]{4}\s[0-9]{2}:[0-9]{2}:[0-9]{2}/", $str, $match))
	echo "match:".$match[0]."\n";
else
	return;

/* mois */
preg_match("/janvier|Janvier|fevrier|Fevrier|mars|Mars|avril|Avril|mai|Mai|juin|Juin|juillet|Juiller|aout|Aout|septembre|Septembre|octobre|Octobre|novembre|Novembre|decembre|Decembre/", $match[0], $month);
$month[0] = ft_get_month_number($month[0]);
echo "le mois =".$month[0]."\n";
/* numero */
preg_match("/[0-9]{1,2}/", $match[0], $day);
echo "le jour =".$day[0]."\n";
/* l'annee */
preg_match("/[0-9]{4}/", $match[0], $year);
echo "l'annee =".$year[0]."\n";
/* seconde */
preg_match("//", $match[0], $year);
echo "l'annee =".$year[0]."\n";
/* minute */
preg_match("//", $match[0], $year);
echo "l'annee =".$year[0]."\n";
/* heure */
preg_match("//", $match[0], $year);
echo "l'annee =".$year[0]."\n";

$hour = 3;
$minute = 30;
$second = 10;
$day = 3;
$year = 2019;


$time = mktime($hour, $minute, $second, $month[0], $day[0], $year);
echo $time;
?>
