

<?php

require '../elements/header.php';

if ($_SERVER['REQUEST_URI'] === '/nous-contacter')
{
	require '../templates/contact.php';
}
else if ($_SERVER['REQUEST_URI'] === '/')
{
	require '../templates/home.php';
}
else
{
	echo "</br>404 page not found buddy</br>";
}

require '../elements/footer.php';

?>


