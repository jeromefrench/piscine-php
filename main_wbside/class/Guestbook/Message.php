<?php

namespace App\Guestbook;
use \DateTime;

class Message {

	const LIMIT_USERNAME = 3;
	const LIMIT_MESSAGE = 10;
	private $username;
	private $message;
	private $date;



	public function __construct(string $username= "aaa", string $message = "aaa", DateTime $date = null)
	{
		$this->username = $username;
		$this->message = $message;
		$this->date = $date ? : new DateTime();
	}

	public function isValid()
	{
		return empty($this->getErrors());
	}

	public function getErrors(): array
	{
		$errors = [];
		if (strlen($this->username) < self::LIMIT_USERNAME)
			$errors['username'] = 'Votre pseudo est trop court';
		if (strlen($this->message) < self::LIMIT_MESSAGE)
			$errors['message'] = 'Votre message est trop court';
		return $errors;
	}

	public function toJSON() : string
	{
		return json_encode([
			'username' => $this->username,
			'message' => $this->message,
			'date' => $this->date->getTimestamp(),
		]);
	}

	public function toHTML()
	{
		$username = htmlentities($this->username);
		$date = $this->date->format('d/m/y a H:i');
		$message = htmlentities($this->message);
		return <<<HTML
		<p>
			<strong>{$username}</strong> <em>le {$date}</em><br/>
			{$message}
		</p>
HTML;
	}



}
?>
