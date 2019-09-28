<?php

if (!(isset($_POST['submit']) && $_POST['submit'] == "OK"))
{
	return;
}
$login = $_POST['login'] ?? "";
$oldpw = $_POST['oldpw'] ?? "";
$newpw = $_POST['newpw'] ?? "";

if ($login == "" || $oldpw == "" || $newpw == "")
{
	echo "ERROR\n";
	return;
}


$global_array = [];
$next = 3;
if (file_exists("./../ex01/private/passwd"))
{
	$str = file_get_contents("./../ex01/private/passwd");
	$global_array = unserialize($str);
	foreach($global_array as $glo_array)
	{
		$next = 3;
		foreach($glo_array as $key => $value)
		{
			echo $key."=>".$value."et next = ".$next."</br></br></br>";
			if ($key == "login" && $value == $login)
			{
				echo "login match</br>";
				$next = 1;
			}

			if ($key == "passwd" && $next == 2 && $value == hash('sha256', $oldpw))
			{
				echo "on change";
				$value = hash('sha256', $newpw);
				$glo_array['passwd'] = hash('sha256', $newpw); //jen suis ici
				echo $value;
			}
			else
			{
				$next++;
			}
		}
	}
	$str = serialize($global_array);
	echo "le str = ".$str;
	file_put_contents("./private/passwd", $str);
}
?>
