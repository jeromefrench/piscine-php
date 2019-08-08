#!/usr/bin/php
<?php
function traitement_title_fiveth($str)
{
	return(strtoupper($str[0]));
}

function traitement_title_fourth($str)
{
	/* echo "function traitement title second\n"; */
	$result = preg_replace_callback('/[^"]/i', 'traitement_title_fiveth', $str);
	return ($result[0]);
}

function traitement_title_second($str)
{
	/* echo "function traitement title second\n"; */
	$result = preg_replace_callback('/".*"/i', 'traitement_title_fourth', $str);
	return ($result[0]);
}

function traitement_title($str)
{
	/* echo "function traitement title\n"; */
	$result = preg_replace_callback('/title=".*"/i', 'traitement_title_second', $str);
	return ($result[0]);
}

function traitement_link_fourth($str)
{
	return(strtoupper($str[0]));
}

function traitement_link_third($str)
{
	/* echo "function traitement link\n"; */
	$result = preg_replace_callback('/[^><]/i', 'traitement_link_fourth', $str);
	return ($result[0]);
}

function traitement_link_second($str)
{
	/* echo "function traitement link\n"; */
	$result = preg_replace_callback('/>[^<]*</i', 'traitement_link_third', $str);
	return ($result[0]);
}

function traitement_link($str)
{
	/* echo "function traitement link\n"; */
	$result = preg_replace_callback('/<a.*>.*</i', 'traitement_link_second', $str);
	return ($result[0]);
}

$str = $argv[1];
/* echo "AAAAAAAAAAAAAAAAAAAAAA\n\n"; */
$result = preg_replace_callback("/<a.*>.*<\/a>/i", 'traitement_title', $str);
$str = $result;
echo $result = preg_replace_callback("/<a.*>.*<\/a>/i", 'traitement_link', $str);
?>
