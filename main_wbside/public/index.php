hello



<?php

require '../vendor/autoload.php';

require '../class/Creneau.php';
require '../class/Form.php';


/* $creneau = new Creneau(9, 12); */
/* $creneau2 = new Creneau(10, 16); */
/* $creneau->intersect($creneau); */
/* var_dump($creneau->intersect($creneau2)); */
/* echo $creneau->toHTML(); */
/* echo Form::checkbox("ma_box", "hello"); */
/* echo Form::$name_class; */



$uri = $_SERVER['REQUEST_URI'];

require '../elements/header.php';
echo '<h1>Bienvenue sur mon site</h1>';

if ($uri === '/contact')
{
	require '../templates/contact.php';
}
else if ($uri === '/')
{
	require '../templates/home.php';
}
else
{
	require '404.php';
}


require '../elements/footer.php';

?>
