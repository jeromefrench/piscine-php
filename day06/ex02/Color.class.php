<?php
/* ************************************************************************** */
/*                                                                            */
/*                                                        :::      ::::::::   */
/*   Color.class.php                                    :+:      :+:    :+:   */
/*                                                    +:+ +:+         +:+     */
/*   By: root </var/mail/root>                      +#+  +:+       +#+        */
/*                                                +#+#+#+#+#+   +#+           */
/*   Created: 2019/08/14 14:07:16 by root              #+#    #+#             */
/*   Updated: 2019/08/14 14:07:16 by root             ###   ########.fr       */
/*                                                                            */
/* ************************************************************************** */

Class Color {
public $red = 0;
public $green = 0;
public $blue = 0;
public static $verbose = FALSE;

public static function doc() {
	echo file_get_contents("./Color.doc.txt");
}
function __construct(array $kwargs) {
	if (!(isset($kwargs)))
	{
		return;
	}
	if (array_key_exists('red', $kwargs) &&
		array_key_exists('green', $kwargs) &&
		array_key_exists('blue', $kwargs))
	{
		$this->red = floor($kwargs['red']);
		$this->green = floor($kwargs['green']);
		$this->blue = floor($kwargs['blue']);
	}
	else if (array_key_exists('rgb', $kwargs))
	{
		$this->red = floor(($kwargs['rgb'] &   0xff0000) >> 16);
		$this->green = floor(($kwargs['rgb'] & 0x00ff00) >> 8);
		$this->blue = floor(($kwargs['rgb'] &  0x0000ff) >> 0);
	}
	else
	{
		echo("not enough argument bro");
		return;
	}
	if (self::$verbose == TRUE)
		echo( "Color( red: ".sprintf("%3s", $this->red).", green: ".sprintf("%3s", $this->green).", blue: ". sprintf("%3s", $this->blue)." ) constructed.". PHP_EOL );
}
function __destruct() {
	if (self::$verbose)
		echo( "Color( red: ".sprintf("%3s", $this->red).", green: ".sprintf("%3s", $this->green).", blue: ". sprintf("%3s", $this->blue)." ) destructed.". PHP_EOL );
	return;
}
function __toString() {
	return( "Color( red: ".sprintf("%3s", $this->red).", green: ".sprintf("%3s", $this->green).", blue: ". sprintf("%3s", $this->blue)." )" );
}

function add($to_add) {
	$this->new_instance = new Color(array('red' => ($this->red + $to_add->red), 'green' => ($this->green + $to_add->green), 'blue' => ($this->blue + $to_add->blue)));
	return $this->new_instance;
}
function sub($to_sub) {
	$this->new_instance = new Color(array('red' => ($this->red - $to_sub->red), 'green' => ($this->green - $to_sub->green), 'blue' => ($this->blue - $to_sub->blue)));
	return $this->new_instance;
}
function mult($to_mul) {
	$this->new_instance = new Color(array('red' => (($this->red * $to_mul)), 'green' => (($this->green * $to_mul)), 'blue' => (($this->blue * $to_mul))));
	return $this->new_instance;
}
}

?>
