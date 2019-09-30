<?php
function auth($login, $passwd)
{
	$str = file_get_contents("./../private/passwd");
	$global_array = unserialize($str);
	$change = false;
	foreach($global_array as $key => $glo_array)
	{
		$check1 = $glo_array['login'] == $login;
		$check2 = $glo_array['passwd'] == hash('sha256', $passwd);
		if ($check1 && $check2)
			$change = true;
	}
	if ($change)
		return (true);
	else
		return (false);
}

?>
