
<?php
//whoiam.php
session_start();
if($_SESSION['loggued_on_user'] == null
	|| $_SESSION['loggued_on_user'] ==  "")
{
	echo "ERROR\n";
}
{
	echo $_SESSION['loggued_on_user']."\n";
}

?>
