<?php
if (count($_GET) == 0)
{
	/* echo "Variable missing, try again mate."; */
	return;
}
foreach ($_GET as $key => $val)
{
	echo $key.": ".$val.PHP_EOL;
	/* echo "<br/>"; */
}
?>
