#!/usr/bin/php
<?php
if ($argc != 2)
	return;
if ($argv[1] == "moyenne")
{

}
else if ($argv[1] == "moyenne_user")
{

}
else if ($argv[1] == "ecart_moulinette")
{

}
else
{
	return;
}

$global_array = [];
$return = " ";
$data  = "";
while ($return != null)
{
	$return = fgets(STDIN);
	if ($return != null)
	{
		$array = str_getcsv($return, ';');
		array_push($global_array, $array);
	}
}
if ($argv[1] == "moyenne")
{
	$nb_note = 0;
	$total = 0;
	foreach ($global_array as $key => $local)
	{
		if ($key != 0)
		{
			$valid = false;
			foreach ($local as $key => $value)
			{
				if ($key == 1)
				{
					if ($value != "")
					{
						$valid = true;
						$note = $value;
					}
					else
					{
						$valid = false;
					}
				}
				if ($valid == true && $key == 2 && $value != "moulinette")
				{
					$total += $note;
					$nb_note++;
				}
			}
		}
	}
	if ($nb_note != 0)
		echo "la moyenne =>".$total / $nb_note;
}

else if ($argv[1] == "moyenne_user" || $argv[1] == "ecart_moulinette")
{
	$user = array();
	$note = array();

	foreach ($global_array as $key => $local)
	{
		//on cree un tab de user
		if ($key != 0)
		{
			$add = true;
			foreach ($user as $val)
			{
				if ($val == $local[0])
					$add = false;
			}
			if ($add == true)
			{
				$user[$local[0]] = $note;
			}
		}
	}

	$mouli = array();

	foreach ($global_array as $key => $local)
	{
		//on ajoute les note au user
		if ($local[1] != "")
		{
			foreach($user as $keybis => $val)
			{
				if ($local[0] == $keybis && $local[2] != "moulinette")
				{
					array_push($user[$keybis], $local[1]);
				}
				if ($local[0] == $keybis && $local[2] == "moulinette")
				{
					echo $local[1].PHP_EOL;
					$mouli[$keybis] = $local[1];
				}
			}
		}
	}
	ksort($user);
	foreach ($user as $key => $val)
	{
		$all = 0;
		$nb = 0;
		foreach ($val as $note)
		{
			$all += $note;
			$nb++;
		}
		if ($nb != 0)
		{
			if ($argv[1] == "moyenne_user")
				echo $key.":".$all/$nb.PHP_EOL;
			if ($argv[1] == "ecart_moulinette")
				echo $key.":".(($all/$nb) - $mouli[$key]).PHP_EOL;
		}
	}
}
else
{
	return;
}
?>

