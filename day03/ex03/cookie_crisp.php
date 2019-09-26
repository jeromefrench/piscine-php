<?php


if (isset($_GET['action']))
{
	if ($_GET['action'] == "set")
	{
		if (!isset($_GET['name']))
		{
			 echo "Name paramater is missing";
			 return;
		}
		if (!isset($_GET['value']))
		{
			 echo "Value paramater is missing";
			 return;
		}
		/* echo "Saving a cookie<br/>"; */
		/* echo "Key = ".$_GET['name']."<br/>"; */
		/* echo "Value = ".$_GET['value']."<br/>"; */
			setcookie($_GET['name'], $_GET['value'], time() + 365 * 24 * 3600, null, null, false, true);
	}
	else if ($_GET['action'] == "get")
	{
		/* echo "ON GET<br/>"; */
		if (!isset($_GET['name']))
		{
			/* echo "Name paramater is missing"; */
			return;
		}
		if (!isset($_COOKIE[$_GET['name']]))
		{
			/* echo "This cookie dosn't exist"; */
			return;
		}
		/* echo "The ".$_GET['name']." = ".$_COOKIE[$_GET['name']]; */
		echo $_COOKIE[$_GET['name']];
	}
	else if ($_GET['action'] == "del")
	{
		/* echo "ON DEL<br/>"; */
		if (!isset($_GET['name']))
		{
			/* echo "Name paramater is missing"; */
			return;
		}
		if (!isset($_COOKIE[$_GET['name']]))
		{
			/* echo "This cookie dosn't exist"; */
			return;
		}
		/* echo "The cookie ".$_GET['name']." = ".$_COOKIE[$_GET['name']]. " has been deleted"; */
		unset($_COOKIE[$_GET['name']]);
	}
}

?>
