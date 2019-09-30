<?php
$user = $_SERVER['PHP_AUTH_USER'];
$pass = $_SERVER['PHP_AUTH_PW'];
$validated = $user == "zaz" && $pass == "jaimelespetitsponeys";

if (!$validated) {
	  header('WWW-Authenticate: Basic realm="My Realm"');
	  header('HTTP/1.0 401 Unauthorized');
	  echo "<html><body>Cette zone est accessible uniquement aux membres du site</body></html>\n";
	  exit;
}
else
{
	$file = base64_encode(file_get_contents("../img/42.png"));
	echo "<html><body>\n";
	echo "Bonjour Zaz<br />\n";
	echo "<img src='data:image/png;base64,$file'>\n";
	echo "</body></html>\n";
}





?>
