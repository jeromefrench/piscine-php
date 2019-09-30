<?php
if(!($_POST != null && $_POST['submit'] != null && $_POST['submit'] = "OK"))
{
	echo "ERROR\n";
	exit(0);
}
$login = $_POST['login'] ?? "";
$oldpw = $_POST['oldpw'] ?? "";
$newpw = $_POST['newpw'] ?? "";

if ($login == "" || $oldpw == "" || $newpw == "")
{
	echo "ERROR\n";
	exit(0);
}
if (!file_exists("./../private"))
{
	echo "ERROR\n";
	exit(0);
}
if (!file_exists("./../private/passwd"))
{
	echo "ERROR\n";
	exit(0);
}
$global_array = [];
$next = 3;
$str = file_get_contents("./../private/passwd");
$global_array = unserialize($str);
if ($global_array == false)
{
	echo "ERROR\n";
	exit(0);
}
$change = false;
foreach($global_array as $key => $glo_array)
{
	$check1 = ($glo_array['login'] == $login);
	$check2 = $glo_array['passwd'] == hash('sha256', $oldpw);
	if ($check1 && $check2)
	{
		echo "OK\n";
		$array = [];
		$array['login'] = $login;
		$array['passwd'] = hash('sha256', $newpw);
		$global_array[$key] = $array;
		$change = true;
	}
}
if (!$change)
{
	echo "ERROR\n";
	exit(0);
}
$str = serialize($global_array);
file_put_contents("./../private/passwd", $str);
header("Location: index.html");
?>

