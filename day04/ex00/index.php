<?php
session_start();

if($_GET != null && $_GET['submit'] != null && $_GET['submit'] = "OK")
{
	if($_GET['login'] != null)
		$_SESSION['login'] = $_GET['login'];
	if($_GET['passwd'] != null)
		$_SESSION['passwd'] = $_GET['passwd'];
}
$login = $_SESSION['login'] ?? "";
$passwd = $_SESSION['passwd'] ?? "";
?>

<html>
<head>
<meta charset="utf-8" />
<title>Exercice 00</title>
</head>
<body>
<?php
echo <<<HTML
<form action="index.php" method="get">
	<p>Login: <input type="text" name="login" value={$login} ></p>
	<p>Password: <input type="password" name="passwd" value={$passwd} ></p>
	<p><input type="submit" name="submit" value="OK" ></p>
</form>
HTML;
?>
</body>
</html>
