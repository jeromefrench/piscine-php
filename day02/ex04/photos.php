#!/usr/bin/php
<?php

echo "hello\n";
/* $str = $argv[1]; */
/* mkdir($str); */

/* $curl = curl_init("https://www.42.fr/"); */
/* $data = curl_exec($curl); */
/* curl_close($curl); */





// create curl resource
$ch = curl_init();

// set url
curl_setopt($ch, CURLOPT_URL, "https://www.42.fr/");

//return the transfer as a string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

// $output contains the output string
$output = curl_exec($ch);


// close curl resource to free up system resources
curl_close($ch);

/* var_dump($output); */

preg_match("/<img[^>]*>/i",$output, $result);
echo $result[0];
preg_match("/<img[^>]*>/i",$result[0], $blah);
echo $blah[0];
preg_match('/src="[^"]*"/i',$blah[0], $bluh);
echo $bluh[0];
preg_match('/"[^"]*"/i',$blah[0], $bluh);
echo "\n-1".$bluh[0]."\n";
preg_match('/[^"]{1,}/i',$bluh[0], $bloh); //comprend pas pk pas d'etoile
echo "0".$bloh[0]."\n";

exec("curl -O ".$bloh[0]);

/* preg_match('/"[^"]*"/i',$bloh[0], $blyh); */
/* echo "1".$blyh[0]."\n"; */
/* preg_match('/[^"]i',$blyh[0], $blhh); */
/* echo "2".$blhh[0]."\n"; */
?>
