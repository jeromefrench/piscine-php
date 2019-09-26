<?php
/* echo $_POST['login']."<br/>"; */
/* echo $_POST['passwd']."<br/>"; */
$my_file = './file.txt';
$str = file_get_contents($my_file);
$objet = unserialize($str,array('allowed_classes'=>false));
$i = 0;
if ($objet != false)
{
foreach ($objet as $user)
{
	if ($user['login'] == $_POST['login'])
	{
		echo hash('sha256', $_POST['oldpw'])."<br/>"; 
		echo $user['passwd']."<br/>";
		if (hash('sha256', $_POST['oldpw']) == $user['passwd'])
		{
			$user['passwd'] = hash('sha256', $_POST['newpw']);
			echo "on change le passwd";
			$objet[$i] = $user;
			return;
		}
		else
		{
			echo "wrong password";
			return;
		}
	}
	$i++;
}
}
echo "no login found";
/* $user['login'] = $_POST['login']; */
/* $user['passwd'] = hash('sha256', $_POST['passwd']); */
/* $objet[$i] = $user; */
file_put_contents($my_file, serialize($objet));
/* echo "login added"; */
?>
