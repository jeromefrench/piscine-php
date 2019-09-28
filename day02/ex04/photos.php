#!/usr/bin/php
<?php
if ($argc == 1)
	return;
$ch = curl_init(); // create curl resource
curl_setopt($ch, CURLOPT_URL, $argv[1]); //link to fetch
curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/5.0 (Windows NT 6.1; rv:19.0) Gecko/20100101 Firefox/19.0");
curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true); // to follow redirection
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);//to return the transfer as a string of the return value of curl_exec() instead of outputting it directly.
$output = curl_exec($ch); // $output contains the output string
curl_close($ch); // close curl resource to free up system resources

preg_match("/<img[^>]*>/i",$output, $result);  // <img .../>
preg_match('/src="[^"]*"/i',$result[0], $bluh); // src="..."
preg_match('/"[^"]*"/i',$bluh[0], $blah);//   "..."
preg_match('/[^"]{1,}/i',$blah[0], $bloh);//link final //comprend pas pk pas d'etoile

preg_match('/(^(http:\/\/)|^(https:\/\/))[^\/]*/i',$argv[1], $new);//link final

$new[0] = str_replace("https://", "", $new[0]);
$new[0] = str_replace("http://", "", $new[0]);

echo 'blah==>'.$bloh[0].PHP_EOL;
echo 'blah==>'.$new[0].PHP_EOL;

if (!file_exists("./".$new[0]))
	mkdir("./$new[0]", 0777, true);

exec("cd ./".$new[0]." &&  curl -O ".$new[0]."/".$bloh[0]);
//tester pour different site
// avec plusieurs image
?>
