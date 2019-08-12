<?php
session_start();
if (isset($_GET['login']))
	$_SESSION['login'] = $_GET['login'];
if (isset($_GET['passwd']))
	$_SESSION['passwd'] = $_GET['passwd'];
?>
<head>
	<meta charset="utf-8" />
	<title>Exercice 01</title>
</head>
<body>
	<form action="index.php" method="get">
	<p>
		Identifiant : <input type="text" name="login"
<?php
if (isset($_SESSION['login']))
{
	echo "value='".$_SESSION['login']."'";
}
?>/><br/>
		Mot de passe : <input type="text" name="passwd"
<?php
if (isset($_SESSION['passwd']))
{
	echo "value='".$_SESSION['passwd']."'";
}
?>
/><br/>
<input type="submit" value="OK" />
</p>
</form>
<?php
?>
</body>
