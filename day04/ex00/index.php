<?php
//isset ??? allowed
session_start();

if(isset($_GET))
{
	if (isset($_GET['submit']))
	{
		if ($_GET['submit'] == "OK")
		{
			if(isset($_GET['login']))
			{
				$_SESSION['login'] = $_GET['login'];
			}
			if(isset($_GET['passwd']))
			{
				$_SESSION['passwd'] = $_GET['passwd'];
			}
		}
	}
	$login = $_SESSION['login'] ?? "";
	$passwd = $_SESSION['passwd'] ?? "";
}

?>

<html>
<head>
<meta charset="utf8" />
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
