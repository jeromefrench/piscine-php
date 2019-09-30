<?php
//login.php
session_start();
if($_GET != null)
{
	$login = $_GET['login'] ?? "";
	$passwd = $_GET['passwd'] ?? "";
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
}
else
{
	echo "ERROR\n";
	$_SESSION['loggued_on_user'] = "";
}





?>
