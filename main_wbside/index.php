<?php


/* use Grafikart\GuestBook\GuestBook; */
/* use Grafikart\GuestBook\Message; */
//equivaux

require 'vendor/autoload.php';

/* use App\Guestbook\{ */
/* 		Guestbook, */
/* 		Message */
/* }; */

use App\Contact\Message as ContactMessage; //a la vole on renome notre class
use App\Guestbook\Guestbook;
use App\Guestbook\Message;


/* require_once 'class/Guestbook/Message.php'; */
/* require_once 'class/Guestbook/Guestbook.php'; */
/* require_once 'class/Contact/Message.php'; */

$demo = new ContactMessage();


$errors = null;
$succes = false;
$guestbook = new Guestbook("./messages");




if (isset($_POST['username'], $_POST['message']))
{
	$message = new Message($_POST['username'], $_POST['message']);
	if ($message->isValid())
	{
		$guestbook->addMessage($message);
		$sucess = true;
		$_POST = [];
	}
	else
	{
		$errors = $message->getErrors();

	}

}

$title = "Livre d'or";
$messages = $guestbook->getMessage();
require 'elements/header.php'
?>

<div class="contaienr">
	<h1>Livre d'or</h1>





<?php if (!empty($errors)): ?> 
<div class="alert alert-danger">
	Formulaire invalide
</div>
<?php endif ?> 

<?php if (empty($errors)): ?> 
<div class="alert alert-success">
	Merci de votre message
</div>
<?php endif ?> 


	<form action="" method="post">
		<div class="form-group">
		<input type-="text" name="username" placeholder="Votre pseudo" value="<?php  if (isset($_POST['username'])) {echo htmlentities($_POST['username']); }else {echo '';} ?>" class="form-control">
			<?php if (isset($errors['username'])): ?>
			<div class="invalid-feedback"><?php echo $errors['username'] ?></div>
			<?php endif ?>

		</div>
		<div class="form-group">
			<textarea name="message" placeholder="Votre speudo" class="form-control"><?php  if (isset($_POST['message'])) {echo htmlentities($_POST['message']); }else {echo '';} ?></textarea>
			<?php if (isset($errors['message'])): ?>
			<div class="invalid-feedback"><?php echo $errors['message'] ?></div>
			<?php endif ?>
		</div>
		<button class="btn btn-primary">Envoyer</button>
	</form>
</div>



<?php
	foreach ($messages as $message)
	{
		/* echo "hello"; */
		/* var_dump($message); */
		echo $message->toHTML();
	}

require 'elements/footer.php'

?>
