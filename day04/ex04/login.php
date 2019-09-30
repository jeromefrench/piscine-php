<?php
 //login.php
session_start();
?>
<html>
<head>
<head>
<body>

<?php

if($_POST != null)
{
	$login = $_POST['login'] ?? "";
	$passwd = $_POST['passwd'] ?? "";
}
else
{
	echo "ERROR\n";
	$_SESSION['loggued_on_user'] = "";
	exit;
}

require_once('./auth.php');

if (auth($login, $passwd))
{
	echo "OK\n";
	$_SESSION['loggued_on_user'] = $login;

	echo '</br><iframe name="chat" id="chat" style="height:550px; width:100%" src="chat.php"></iframe>';
	echo '</br><iframe style="height:50px; width:100%" src="speak.php"></iframe>';
}
else
{
	echo "ERROR\n";
	$_SESSION['loggued_on_user'] = "";
}
?>

</body>
<html>
