<?php
//fonction non authorise
if (isset($_POST['submit']) && $_POST['submit'] == "OK")
{
	$login = $_POST['login'] ?? "";
	$passwd = $_POST['passwd'] ?? "";
}
else
{
	echo "ERROR\n";
	return;
}
if ($login == "" || $passwd == "")
{
	echo "ERROR\n";
	return;
}
else
{
	$array = [];
	$array['login'] = $login;
	$array['passwd'] = hash('sha256', $passwd);

$global_array = [];
if( !is_dir( "./private" ) )
	mkdir("./private"  , 0777, true );
if (file_exists("./private/passwd"))
{
	$str = file_get_contents("./private/passwd");
	$global_array = unserialize($str);
	echo "le globlal ";
	var_dump($global_array);
	foreach($global_array as $glo_array)
	{
		foreach($glo_array as $key => $value)
		{
			if ($key == "login" && $value == $login)
			{
				echo "ERRORS\n";// echo "same value";
				return;
			}

		}
	}
}
array_push($global_array, $array); ///////////nn othorise
$str = serialize($global_array);
file_put_contents("./private/passwd", $str);
echo "OK\n";
}
?>
