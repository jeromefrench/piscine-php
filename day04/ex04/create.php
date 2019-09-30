<?php
if($_POST != null && $_POST['submit'] != null && $_POST['submit'] = "OK")
{
	$login = $_POST['login'] ?? "";
	$passwd = $_POST['passwd'] ?? "";
}
else
{
	echo "ERROR\n";
	exit(0);
}
if ($login == "" || $passwd == "")
{
	echo "ERROR\n";
	exit(0);
}
else
{
	$array = [];
	$global_array = [];
	$array['login'] = $login;
	$array['passwd'] = hash('sha256', $passwd);

	if( !file_exists( "./../private" ) )
		mkdir("./../private"  , 0777, true );
	if (file_exists("./../private/passwd"))
	{
		$str = file_get_contents("./../private/passwd");
		$global_array = unserialize($str);
		if ($global_array != false)
		{
		foreach($global_array as $glo_array)
		{
			foreach($glo_array as $key => $value)
			{
				if ($key == "login" && $value == $login)
				{
					echo "ERRORS\n";// echo "same value";
					exit(0);
				}
			}
		}
		}
	}
	$global_array[] =  $array;
	$str = serialize($global_array);
	file_put_contents("./../private/passwd", $str);
	echo "OK\n";
	header("Location: index.html");
}
?>

