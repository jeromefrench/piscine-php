<?php
date_default_timezone_set("Europe/Paris");
if (file_exists("./../private/chat"))
{
	$fp = fopen("./../private/chat", "r+");
	if (flock($fp, LOCK_SH))
	{
		$str = file_get_contents("./../private/chat");
		$glo_aray = unserialize($str);
		foreach($glo_aray as $array)
		{
			echo '['.date("H:s", $array['time']).']  ';
			echo '<b>'.$array['login'].'</b>: ';
			echo $array['msg'];
			echo '</br>';
		}
	}
}
?>

