<?php
/* echo $_POST['login']."<br/>"; */
/* echo $_POST['passwd']."<br/>"; */
$my_file = './file.txt';
$str = file_get_contents($my_file);
$i = 0;
if ($str != false)
{
	$objet = unserialize($str,array('allowed_classes'=>false));
	if ($objet != false)
	{
		foreach ($objet as $user)
		{
			if ($user['login'] == $_POST['login'])
			{
				echo "error\n";
				return; 
			}
			$i++;
		}
	}
}
$user['login'] = $_POST['login'];
$user['passwd'] = hash('sha256', $_POST['passwd']);
$objet[$i] = $user;
file_put_contents($my_file, serialize($objet));
echo "login added";
?>
