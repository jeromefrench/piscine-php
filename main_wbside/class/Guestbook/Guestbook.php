<?php
namespace App\Guestbook;
require_once 'Message.php';
use App\Guestbook\Message;
use \DateTime;

class Guestbook
{
	private $file;
	public function __construct(string $file)
	{
		$directory = dirname($file);
		if (!is_dir($directory))
		{
			mkdir($directory, 0777, true);
		}
		if (!file_exists($file))
		{
			touch($file);
		}
		$this->file = $file;
	}

	public function addMessage(Message $message)
	{
		file_put_contents($this->file, $message->toJSON().PHP_EOL, FILE_APPEND);

	}

	public function getMessage():array
	{
		$content = trim(file_get_contents("/var/www/html/piscine-php/main_wbside/messages"));
		echo "</br></br>";
		$lines = explode(PHP_EOL, $content);
		$messages = [];

		foreach ($lines as $line)
		{
			$data = json_decode($line, true);
			$date = new DateTime("@1171502725");
			$messages[] = new Message($data['username'], $data['message'],  $date  );  //synta?
		}
		return $messages;
	}
}


?>
